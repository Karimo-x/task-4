@extends('Auth.login')
@section('title', 'tags')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">logout</button>
        </form></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active btn btn-info btn btn-primary" aria-current="page" href="{{ route('users.index') }}">users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active btn btn-info mx-3" aria-current="page" href="{{ route('posts.index') }}">posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active btn btn-info" aria-current="page" href="{{ route('categories.index') }}">categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <a href="{{ route('tags.create') }}" class="btn btn-primary mx-5 mt-5">add Tag</a>
    <h3 class="mx-5 mt-3">Available Tags :</h3>
    @if (!$tags->isEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tag Name</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td> <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-primary">Show</a></td>
                        <td> <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-secondary">Edit</a></td>
                        <td>
                            <form action="{{ route('tags.destroy' , $tag->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>There are no tags to show</p>
    @endif
@endsection
