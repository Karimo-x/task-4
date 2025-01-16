@extends('layouts.app')
@section('title', 'posts')
@section('content')
 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">logout</button>
                </form>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        @can('managerUser' , auth()->user())
                        <a class="nav-link active btn btn-info btn btn-primary" aria-current="page"
                            href="{{ route('users.index') }}">users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-info mx-3" aria-current="page"
                            href="{{ route('tags.index') }}">tags</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-info" aria-current="page"
                            href="{{ route('categories.index') }}">categories</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


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
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <p>No posts available </p>
        @endforelse
    </div>
@endsection
