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
    <x-input-label for="image" :value="__('Image')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*"/>
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
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
