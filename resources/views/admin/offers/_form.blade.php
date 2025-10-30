<!-- Title -->
<div>
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $offer->title ?? '')" required autofocus />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<!-- Description -->
<div class="mt-4">
    <x-input-label for="description" :value="__('Description')" />
    <textarea id="description" name="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $offer->description ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<!-- Order -->
<div class="mt-4">
    <x-input-label for="order" :value="__('Order')" />
    <x-text-input id="order" class="block mt-1 w-full" type="number" name="order" :value="old('order', $offer->order ?? 0)" required />
    <x-input-error :messages="$errors->get('order')" class="mt-2" />
</div>

<!-- Image -->
<div class="mt-4">
    <x-input-label for="image_upload" :value="__('Image')" />
    <input id="image_upload" name="image_path" type="file" class="mt-1 block w-full" accept="image/*"/>
    <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
    @if (isset($offer) && $offer->image_path)
        <div class="mt-2">
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $offer->image_path) }}" alt="Current Image" class="w-48 h-auto">
        </div>
    @endif
</div>

<div class="flex items-center justify-end mt-4">
    <x-primary-button class="ml-4">
        {{ __('Save') }}
    </x-primary-button>
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
                    Crop & Save
                </button>
                <button id="cancelCropButton" class="mt-2 px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function initializeOfferCropper() {
        console.log('initializeOfferCropper called.');
        let cropper;
        const imageUpload = document.getElementById('image_upload');
        const imageCropModal = document.getElementById('imageCropModal');
        const imageToCrop = document.getElementById('imageToCrop');
        const cropButton = document.getElementById('cropButton');
        const cancelCropButton = document.getElementById('cancelCropButton');
        const offerForm = document.getElementById('offer-form');

        console.log('Elements found:', { imageUpload, imageCropModal, imageToCrop, cropButton, cancelCropButton, offerForm });

        if (!imageUpload || !imageCropModal || !imageToCrop || !cropButton || !cancelCropButton || !offerForm) {
            console.log('One or more required elements not found. Cropper initialization skipped.');
            return; // Exit if elements are not found (e.g., on other pages)
        }

        imageUpload.addEventListener('change', function (e) {
            console.log('Image upload change event fired.');
            const files = e.target.files;
            if (files && files.length > 0) {
                console.log('File selected:', files[0].name);
                const reader = new FileReader();
                reader.onload = function (event) {
                    console.log('FileReader loaded. Setting image source and showing modal.');
                    imageToCrop.src = event.target.result;
                    imageCropModal.classList.remove('hidden');
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(imageToCrop, {
                        aspectRatio: 1 / 1, // Adjust aspect ratio as needed for your offer images
                        viewMode: 1,
                        autoCropArea: 0.8,
                    });
                    console.log('Cropper initialized.');
                };
                reader.readAsDataURL(files[0]);
            }
        });

        cropButton.addEventListener('click', function () {
            console.log('Crop button clicked.');
            if (cropper) {
                cropper.getCroppedCanvas().toBlob((blob) => {
                    console.log('Image cropped to blob.');
                    const file = new File([blob], "offer_image.png", { type: "image/png" });
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    imageUpload.files = dataTransfer.files;
                    
                    imageCropModal.classList.add('hidden');
                    cropper.destroy();
                    console.log('Cropper destroyed, modal hidden.');
                }, 'image/png', 0.9); 
            }
        });

        cancelCropButton.addEventListener('click', function () {
            console.log('Cancel button clicked.');
            imageCropModal.classList.add('hidden');
            if (cropper) {
                cropper.destroy();
            }
            imageUpload.value = ''; 
            console.log('Modal hidden, image input cleared.');
        });

        offerForm.addEventListener('submit', function(e) {
            console.log('Form submit event fired.');
            if (imageUpload.files && imageUpload.files.length === 0 && imageUpload.required) {
                e.preventDefault();
                alert('Please select and crop an image before uploading.');
                console.log('Form submission prevented: no image selected.');
            }
        });
    }

    // Call the function directly when the script is loaded
    initializeOfferCropper();
</script>
