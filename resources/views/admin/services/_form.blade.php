<!-- Title -->
<div>
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $service->title)" required autofocus />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<!-- Description -->
<div class="mt-4">
    <x-input-label for="description" :value="__('Description')" />
    <textarea id="description" name="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $service->description) }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<!-- Order -->
<div class="mt-4">
    <x-input-label for="order" :value="__('Order')" />
    <x-text-input id="order" class="block mt-1 w-full" type="number" name="order" :value="old('order', $service->order ?? 0)" required />
    <x-input-error :messages="$errors->get('order')" class="mt-2" />
</div>

<!-- Image -->
<div class="mt-4">
    <x-input-label for="image" :value="__('Image')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*"/>
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
    @if ($service->image_path)
        <div class="mt-2">
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $service->image_path) }}" alt="Current Image" class="w-48 h-auto">
        </div>
    @endif
</div>

<input type="hidden" name="cropped_image" id="cropped_image">

<div class="flex items-center justify-end mt-4">
    <x-primary-button class="ml-4">
        {{ __('Save') }}
    </x-primary-button>
</div>

<!-- Crop Modal -->
<div id="crop-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Crop Image
                        </h3>
                        <div class="mt-2">
                            <img id="image-to-crop" src="" alt="Image to crop">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <x-primary-button type="button" id="crop-button" class="w-full justify-center sm:ml-3 sm:w-auto">
                    Crop & Save
                </x-primary-button>
                <x-secondary-button id="cancel-crop-button" class="mt-3 w-full justify-center sm:mt-0 sm:ml-3 sm:w-auto">
                    Cancel
                </x-secondary-button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('service-form');
    if (!form) return;

    const imageInput = form.querySelector('#image');
    const croppedImageInput = form.querySelector('#cropped_image');
    const modal = document.getElementById('crop-modal');
    const imageToCrop = document.getElementById('image-to-crop');
    const cropButton = document.getElementById('crop-button');
    const cancelCropButton = document.getElementById('cancel-crop-button');
    let cropper;

    imageInput.addEventListener('change', function (e) {
        const files = e.target.files;
        if (files && files.length > 0) {
            const reader = new FileReader();
            reader.onload = function (event) {
                imageToCrop.src = event.target.result;
                modal.classList.remove('hidden');
                cropper = new Cropper(imageToCrop, {
                    aspectRatio: 4 / 3,
                    viewMode: 1,
                });
            };
            reader.readAsDataURL(files[0]);
        }
    });

    cropButton.addEventListener('click', function () {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas();
            canvas.toBlob(function (blob) {
                const reader = new FileReader();
                reader.onloadend = function() {
                    croppedImageInput.value = reader.result;
                    submitForm();
                }
                reader.readAsDataURL(blob);
            });
            modal.classList.add('hidden');
        }
    });

    cancelCropButton.addEventListener('click', function () {
        modal.classList.add('hidden');
        imageInput.value = ''; // Reset file input
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        // If a new image is selected, submission is handled by crop button.
        // Otherwise, submit form normally (for edits without image change).
        if (!imageInput.files || imageInput.files.length === 0) {
            submitForm();
        }
    });

    function submitForm() {
        const formData = new FormData(form);
        formData.delete('image');

        if (!croppedImageInput.value) {
            formData.delete('cropped_image');
        }

        const url = form.getAttribute('action');
        const method = form.querySelector('input[name="_method"]')?.value || 'POST';

        fetch(url, {
            method: 'POST', // Always POST, Laravel handles PUT/PATCH via _method field
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.redirect_url) {
                if (window.parent.loadDynamicContent) {
                    window.parent.loadDynamicContent(data.redirect_url);
                } else {
                    window.location.href = data.redirect_url;
                }
            } else {
                alert(data.message || 'An error occurred.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred during the form submission.');
        });
    }
});
</script>