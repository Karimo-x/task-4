@extends('layouts.app')
@section('title', 'edit comment')
@section('content')
    <h3 class="mx-3 my-3">Edit a comment :</h3>
    <form action="{{ route('comments.update', $comment->id) }}" class="login" method="POST">
        <div class="mb-3">
            @method('PUT')
            @csrf
            <label for="content" class="form-label">Content Comment :</label>
            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter a comment">{{ $comment->content }}</textarea>
            <button type="submit" class="btn btn-primary mt-2">send</button>
        </div>
    </form>
@endsection
