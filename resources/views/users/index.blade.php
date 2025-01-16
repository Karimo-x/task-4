@extends('layouts.app')
@section('title', 'users')
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
                        <a class="nav-link active btn btn-info" aria-current="page" href="{{ route('categories.index') }}">categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-info mx-3" aria-current="page" href="{{ route('posts.index') }}">posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-info" aria-current="page" href="{{ route('tags.index') }}">tags</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <a href="{{ route('users.create') }}" class="btn btn-primary mx-5 mt-5">add user</a>
    <h3 class="mx-5 mt-3">Available Users :</h3>
    @if (!$users->isEmpty())
    <table class="table">
        <thead>
            <tr>
                <th scope="col">image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">is_admin</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><img src="/assets/images/users/{{ $user->image }}" alt="user image" class="userimg"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">show</a></td>
                    <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">edit</a></td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>There are no users to show</p>
    @endif
@endsection
