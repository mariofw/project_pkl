@csrf
<div class="mb-4">
    <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
    <select name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        <option value="standard" @if(old('type', $article->type ?? 'standard') == 'standard') selected @endif>Standard</option>
        <option value="activity" @if(old('type', $article->type ?? '') == 'activity') selected @endif>Activity</option>
    </select>
    @error('type')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    @error('title')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
    <textarea name="content" id="content" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('content', $article->content ?? '') }}</textarea>
    @error('content')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
    <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @if (isset($article) && $article->image)
        <div class="mt-2">
            <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-48 h-auto">
        </div>
    @endif
    @error('image')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4" id="link-field">
    <label for="link" class="block text-gray-700 text-sm font-bold mb-2">Link</label>
    <input type="text" name="link" id="link" value="{{ old('link', $article->link ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('link')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="flex items-center justify-between">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        {{ $submitButtonText ?? 'Create Article' }}
    </button>
    
    <div class="flex items-center">
        @if (isset($article) && $article->exists)
            <a href="{{ route('articles.show', $article) }}" class="inline-block align-baseline font-bold text-sm text-green-500 hover:text-green-800 mr-4" target="_blank">
                View Article
            </a>
        @endif
        <a href="{{ route('admin.articles.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
            Cancel
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeElement = document.getElementById('type');
        const linkField = document.getElementById('link-field');

        function toggleLinkField() {
            if (typeElement.value === 'activity') {
                linkField.style.display = 'none';
            } else {
                linkField.style.display = 'block';
            }
        }

        toggleLinkField();

        typeElement.addEventListener('change', toggleLinkField);
    });
</script>