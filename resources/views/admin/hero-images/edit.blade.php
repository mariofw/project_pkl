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
                    <form id="update-form" method="POST" action="{{ route('admin.hero-images.update', $image) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="image" :value="__('Image')" />

                            <input id="image" class="block mt-1 w-full" type="file" name="image" />

                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Hero Image" class="w-full h-auto">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update Image') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('update-form');
            if (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const formData = new FormData(this);
                    const url = this.getAttribute('action');

                    // Since PUT is not supported directly in forms for file uploads,
                    // we use POST and the server will read the _method field.
                    fetch(url, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Find the link in the parent document's sidebar and click it
                            const slideFotoLink = window.parent.document.querySelector('a[href="{{ route('admin.hero-images.index') }}"]');
                            if (slideFotoLink) {
                                slideFotoLink.click();
                            }
                        } else {
                            // Handle errors
                            alert(data.message || 'An error occurred.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred during the update.');
                    });
                });
            }
        });
    </script>
</x-app-layout>