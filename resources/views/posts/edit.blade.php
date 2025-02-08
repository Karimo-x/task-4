@extends('layouts.app')
@section('title', 'edit a post')
@section('content')
    <h2 class="mx-5 mt-3">Edit post :</h2>
    <form action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" method="POST" class="login">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title Post :</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label"> Content Post :</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Post image :</label>
            <div>If you wanna change the picture press it :</div>
            <input type="file" class="form-control" id="image" name="image" style="display: none">
            <label for="image" class="form-label"><img src="/assets/images/posts/{{ $post->image }}"
                    class="card-img-top image" alt="..."></label>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category Post :</label>
            <select class="form-select" name="category_id" id="category_id" multiple aria-label="multiple select example">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($post->category_id == $category->id) selected @endif>
                        {{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tag_id" class="form-label">Tags Post :</label>
            <select class="form-select" name="tags[]" id="tag_id" multiple aria-label="multiple select example">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"
                        @foreach ($post->tags as $tagId)
                            @if ($tagId->id == $tag->id)
                            selected
                            @endif
                        @endforeach
                        
                        >{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">send</button>
    </form>
@endsection
