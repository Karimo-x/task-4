@extends('layouts.app')
@section('title', 'users')
@section('content')
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
                            <button onclick="return confirmDelete();" type="submit" class="btn btn-danger" @if ($user->is_admin)
                            disabled 
                            @endif>delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="mx-5">There are no users to show</p>
    @endif
@endsection
