@extends('layouts.app')

@section('content')
    <h1>Edit Article</h1>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $article->title }}" required>
        <br>

        <label for="content">Content</label>
        <textarea name="content" id="content" required>{{ $article->content }}</textarea>
        <br>

        <button type="submit">Update Article</button>
    </form>
@endsection
