@extends('layouts.app')
@section('title', 'posts')
@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-primary mx-3 mt-3">Create Post</a>
    <div class="containerposts ">
        @forelse ($posts as $post)
        <div class="container2">
                <div class="face mx-3 mt-3">
                    <div>
                        <img src="/assets/images/users/{{ $post->user->image }}" class="userprofile" alt="user image">
                    </div>
                    <p class="userName mx-2">{{ $post->user->name }}</p>
                </div>
                <div class="card mx-3" style="width: 18rem;">
                    <img src="/assets/images/posts/{{ $post->image }}" class="card-img-top hieght" alt="Post image">
                    <div class="card-body">
                        <p class="text-primary">{{ $post->category->title }}</p>
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">show</a>
                        @can('ownerPost' , $post)
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">edit</a>
                        <form action="{{ route('posts.destroy' , $post->id) }}" style="display: inline" method="POST">
                            @csrf
                            @method("DELETE")
                            <button onclick="return confirmDelete();" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <p class="mx-3">No posts available </p>
        @endforelse
    </div>
@endsection
