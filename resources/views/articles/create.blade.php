@extends('layouts.app')

@section('content')
    <h1>Add New Article</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
        <br>

        <label for="content">Content</label>
        <textarea name="content" id="content" required></textarea>
        <br>

        <button type="submit">Save Article</button>
    </form>
@endsection
