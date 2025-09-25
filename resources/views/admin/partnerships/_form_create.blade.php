<div class="mb-4">
    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Partner Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $partnership->name ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('name')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Partner Image:</label>
    <input type="file" name="images[]" id="images" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('images')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
