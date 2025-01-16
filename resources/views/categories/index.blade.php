@extends('layouts.app')
@section('title', 'categories')
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
                        <a class="nav-link active btn btn-info btn btn-primary" aria-current="page"
                            href="{{ route('users.index') }}">users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-info mx-3" aria-current="page"
                            href="{{ route('posts.index') }}">posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-info" aria-current="page"
                            href="{{ route('tags.index') }}">tags</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mx-2 mt-5">create a new category</a>
    <div class="container1">
        @if (!$categories->isEmpty())
        @foreach ($categories as $category)
            <div class="card mx-2 mt-3" style="width: 18rem;">
                <img src="/assets/images/categories/{{ $category->image }}" class="card-img-top hieght" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->title }}</h5>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">show</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary">edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <p>There are no categories to show</p>
@endif
@endsection
