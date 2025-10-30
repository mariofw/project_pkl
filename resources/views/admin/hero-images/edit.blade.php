<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Hero Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="hero-image-form" method="POST" action="{{ route('admin.hero-images.update', $image) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="image_upload" :value="__('New Image (optional)')" />
                            <input id="image_upload" name="image_path" type="file" class="mt-1 block w-full" accept="image/*" />
                            <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
                        </div>

                        <div class="mt-4">
                            <p>Current Image:</p>
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Hero Image" class="w-full h-auto max-w-md">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="submit">
                                {{ __('Update Image') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Cropper Modal -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden" id="imageCropModal">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Crop Image</h3>
                <div class="mt-2 px-7 py-3">
                    <div class="img-container">
                        <img id="imageToCrop" src="" alt="Image to crop" class="max-w-full h-auto mx-auto">
                    </div>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="cropButton" class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                        Crop & Update
                    </button>
                    <button id="cancelCropButton" class="mt-2 px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script>
        function initializeHeroImageCropper() {
            console.log('initializeHeroImageCropper called for edit.');
            let cropper;
            const imageUpload = document.getElementById('image_upload');
            const imageCropModal = document.getElementById('imageCropModal');
            const imageToCrop = document.getElementById('imageToCrop');
            const cropButton = document.getElementById('cropButton');
            const cancelCropButton = document.getElementById('cancelCropButton');
            const heroImageForm = document.getElementById('hero-image-form');

            console.log('Elements found for edit:', { imageUpload, imageCropModal, imageToCrop, cropButton, cancelCropButton, heroImageForm });

            if (!imageUpload || !imageCropModal || !imageToCrop || !cropButton || !cancelCropButton || !heroImageForm) {
                console.log('One or more required elements not found for edit. Cropper initialization skipped.');
                return; // Exit if elements are not found (e.g., on other pages)
            }

            imageUpload.addEventListener('change', function (e) {
                console.log('Image upload change event fired for edit.');
                const files = e.target.files;
                if (files && files.length > 0) {
                    console.log('File selected for edit:', files[0].name);
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        console.log('FileReader loaded for edit. Setting image source and showing modal.');
                        imageToCrop.src = event.target.result;
                        imageCropModal.classList.remove('hidden');
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(imageToCrop, {
                            aspectRatio: 16 / 9, // Adjust aspect ratio as needed for your hero images
                            viewMode: 1,
                            autoCropArea: 0.8,
                        });
                        console.log('Cropper initialized for edit.');
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            cropButton.addEventListener('click', function () {
                console.log('Crop button clicked for edit.');
                if (cropper) {
                    cropper.getCroppedCanvas().toBlob((blob) => {
                        console.log('Image cropped to blob for edit.');
                        const file = new File([blob], "hero_image.png", { type: "image/png" });
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        imageUpload.files = dataTransfer.files;
                        
                        imageCropModal.classList.add('hidden');
                        cropper.destroy();
                        console.log('Cropper destroyed, modal hidden for edit.');
                    }, 'image/png', 0.9); 
                }
            });

            cancelCropButton.addEventListener('click', function () {
                console.log('Cancel button clicked for edit.');
                imageCropModal.classList.add('hidden');
                if (cropper) {
                    cropper.destroy();
                }
                imageUpload.value = ''; 
                console.log('Modal hidden, image input cleared for edit.');
            });

            heroImageForm.addEventListener('submit', function(e) {
                console.log('Form submit event fired for edit.');
                if (imageUpload.files && imageUpload.files.length > 0) {
                    // The current logic ensures imageUpload.files is updated after cropping.
                    // So, if imageUpload.files has a file, it means it's cropped.
                    // No explicit check needed here as the cropButton updates imageUpload.files.
                }
            });
        }

        // Call the function directly when the script is loaded
        // initializeHeroImageCropper(); // Removed direct call
    </script>
</x-app-layout>
