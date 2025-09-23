<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload New Hero Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="upload-form" method="POST" action="{{ route('admin.hero-images.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Hidden input for cropped image data -->
                        <input type="hidden" name="image" id="cropped-image-data">

                        <!-- Image Input -->
                        <div>
                            <x-input-label for="image-upload" :value="__('Image (aspect ratio 19:6 required)')" />
                            <x-text-input id="image-upload" class="block mt-1 w-full" type="file" name="image_upload" required accept="image/*" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Cropped image preview -->
                        <div id="preview-container" class="mt-4" style="display: none;">
                            <x-input-label :value="__('Cropped Image Preview')" />
                            <img id="preview" src="" alt="Cropped image preview" class="max-w-full h-auto">
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button id="upload-button" class="ml-4" disabled>
                                {{ __('Upload') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Crop Modal -->
                    <div id="crop-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px;">
                            <h2 class="text-lg font-semibold mb-4">Crop Image</h2>
                            <div>
                                <img id="image-to-crop" src="" style="max-width: 80vw; max-height: 80vh;">
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <button type="button" id="crop-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Crop
                                </button>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const imageUpload = document.getElementById('image-upload');
                            const cropModal = document.getElementById('crop-modal');
                            const imageToCrop = document.getElementById('image-to-crop');
                            const cropButton = document.getElementById('crop-button');
                            const croppedImageDataInput = document.getElementById('cropped-image-data');
                            const previewContainer = document.getElementById('preview-container');
                            const preview = document.getElementById('preview');
                            const uploadButton = document.getElementById('upload-button');
                            let cropper;

                            imageUpload.addEventListener('change', function (e) {
                                const files = e.target.files;
                                if (files && files.length > 0) {
                                    const reader = new FileReader();
                                    reader.onload = function (event) {
                                        imageToCrop.src = event.target.result;
                                        cropModal.style.display = 'block';
                                        if (cropper) {
                                            cropper.destroy();
                                        }
                                        cropper = new Cropper(imageToCrop, {
                                            aspectRatio: 19 / 6,
                                            viewMode: 1,
                                        });
                                    };
                                    reader.readAsDataURL(files[0]);
                                }
                            });

                            cropButton.addEventListener('click', function () {
                                if (cropper) {
                                    const canvas = cropper.getCroppedCanvas();
                                    const croppedImageData = canvas.toDataURL('image/jpeg');
                                    croppedImageDataInput.value = croppedImageData;
                                    
                                    preview.src = croppedImageData;
                                    previewContainer.style.display = 'block';

                                    uploadButton.disabled = false;

                                    cropModal.style.display = 'none';
                                    if (cropper) {
                                        cropper.destroy();
                                    }
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
