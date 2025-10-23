<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 font-medium text-sm text-red-600">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="flex items-center justify-end mb-4">
                        @if ($images->count() < 5)
                            <a href="{{ route('admin.hero-images.create') }}">
                                <x-primary-button>
                                    {{ __('Upload New Image') }}
                                </x-primary-button>
                            </a>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($images as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Hero Image" class="w-full h-auto">
                                <div class="absolute top-0 right-0 mt-2 mr-2 flex space-x-2">
                                    <a href="{{ route('admin.hero-images.edit', $image) }}">
                                        <x-secondary-button>
                                            {{ __('Edit') }}
                                        </x-secondary-button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.hero-images.destroy', $image) }}" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button type="submit">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>