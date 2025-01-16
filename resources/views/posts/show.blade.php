@extends('layouts.app')
@section('title', 'show post')
@section('content')
    <div class="card text-center login">
        <div class="card-header">
            Post information
        </div>
        <div class="card-body">
            <div class="face mx-3 mt-3">
                <div>
                    <img src="/assets/images/users/{{ $post->user->image }}" class="userprofile" alt="user image">
                </div>
                <p class="userName mx-2">{{ $post->user->name }}</p>
            </div>
            <h5 class="card-title"> Title : {{ $post->title }}</h5>
            <img src="/assets/images/posts/{{ $post->image }}" class="card-img-top image" alt="...">
            <p class="text-primary">Category : {{ $post->category->title }}</p>
            <p class="card-text">Content : {{ $post->content }}</p>
            Tags:
            @forelse ($post->tags as $tag)
                <span class="text-primary">#{{ $tag->name }}</span>
            @empty
                <p>There are no any tags on this post</p>
            @endforelse
            <p class="card-text">Created at : {{ $post->created_at }}</p>
            <p class="card-text">Updated at : {{ $post->updated_at }}</p>

            <a href="{{ route('posts.index') }}" class="btn btn-primary">back to => </a>
        </div>
        <div class="card-footer text-muted">
            Post comments
        </div>
    </div>

    <form class="login" action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <label for="comment" class="form-label">Post Comment :</label>
        <div class="mb-3 d-flex">
            <input type="text" id="comment" class="form-control " name="content" rows="3"
                placeholder="Enter a Comment">
            <button type="submit" class="btn btn-primary mx-2 ">send</button>
        </div>
    </form>

    @forelse ($post->comments as $comment)
        <div class="card login my-3">
            <div class="card-header">
                Created at : {{ $comment->created_at }}
            </div>
            <div class="card-body">
                <div class="usercomment d-flex ">
                    <img src="/assets/images/users/{{ $comment->user->image }}" class="userprofile" alt="user image">
                    <h5 class="card-title">{{ $comment->user->name }}</< /h5>
                </div>
                <p class="card-text fs-5 mt-2">{{ $comment->content }}</p>
                @can('ownerCommentDelete', $comment)
                        @can('ownerCommentupdate', $comment)
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary">edit</a>
                        @endcan
                        <form action="{{ route('comments.destroy', $comment->id) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                @endcan
            </div>
        </div>
    @empty
        <p class="mx-5  ">There are no any comments on this post</p>
    @endforelse

@endsection
