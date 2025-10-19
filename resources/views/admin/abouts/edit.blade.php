<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit About Me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($aboutSection)
                        <form action="{{ route('admin.sections.update', $aboutSection) }}" method="POST" class="mb-6">
                            @csrf
                            @method('PUT')
                            <h3 class="text-lg font-semibold mb-4">Edit Section Title</h3>
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $aboutSection->title)" required autofocus />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="subtitle" :value="__('Subtitle')" />
                                <x-text-input id="subtitle" class="block mt-1 w-full" type="text" name="subtitle" :value="old('subtitle', $aboutSection->subtitle)" />
                                <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4">
                                    {{ __('Update Title') }}
                                </x-primary-button>
                            </div>
                        </form>
                    @endif
                    <h1 class="text-2xl font-bold mb-6">Edit About Me</h1>
                    <form action="{{ route('admin.abouts.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        @include('admin.abouts._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
