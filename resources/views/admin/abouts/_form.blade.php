<div class="mb-4">
    <label for="tentang_kami" class="block text-gray-700 text-sm font-bold mb-2">Tentang Kami:</label>
    <textarea name="tentang_kami" id="tentang_kami" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('tentang_kami', $about->tentang_kami ?? '') }}</textarea>
    @error('tentang_kami')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="visi" class="block text-gray-700 text-sm font-bold mb-2">Visi:</label>
    <textarea name="visi" id="visi" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('visi', $about->visi ?? '') }}</textarea>
    @error('visi')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="misi" class="block text-gray-700 text-sm font-bold mb-2">Misi:</label>
    <textarea name="misi" id="misi" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('misi', $about->misi ?? '') }}</textarea>
    @error('misi')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="flex items-center justify-between">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Save
    </button>
    <a href="{{ route('dashboard') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
        Cancel
    </a>
</div>