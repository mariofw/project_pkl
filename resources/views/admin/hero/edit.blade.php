<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Hero Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $hero->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Subtitle -->
                        <div class="mt-4">
                            <x-input-label for="subtitle" :value="__('Subtitle')" />
                            <textarea id="subtitle" name="subtitle" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('subtitle', $hero->subtitle) }}</textarea>
                            <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                        </div>

                        <!-- Button Text -->
                        <div class="mt-4">
                            <x-input-label for="button_text" :value="__('Button Text')" />
                            <x-text-input id="button_text" class="block mt-1 w-full" type="text" name="button_text" :value="old('button_text', $hero->button_text)" />
                            <x-input-error :messages="$errors->get('button_text')" class="mt-2" />
                        </div>

                        <!-- Button Link -->
                        <div class="mt-4">
                            <x-input-label for="button_link" :value="__('Button Link')" />
                            <x-text-input id="button_link" class="block mt-1 w-full" type="text" name="button_link" :value="old('button_link', $hero->button_link)" />
                            <x-input-error :messages="$errors->get('button_link')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Background Image')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            @if ($hero->image_path)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $hero->image_path) }}" alt="Current Image" class="w-48 h-auto">
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
