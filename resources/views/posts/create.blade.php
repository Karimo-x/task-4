@extends('layouts.app')
@section('title', 'create a post')
@section('content')

    <h2 class="mx-5 mt-3">Create a new post :</h2>
    <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST" class="login">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title Post :</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label"> Content Post :</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image Post :</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category Post :</label>
            <select class="form-select" name="category_id" id="category_id" multiple aria-label="multiple select example">
                <option>Open this select menu</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tag_id" class="form-label">Tags Post :</label>
            <select class="form-select" name="tags[]" id="tag_id" multiple aria-label="multiple select example">
                <option selected>Open this select menu</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">send</button>
    </form>
@endsection
