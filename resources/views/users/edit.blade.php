@extends('layouts.app')
@section('title', 'update user')
@section('content') 
    <h3>Edit user :</h3>
    <form action="{{ route('users.update' , $user->id) }}" method="POST" class="login" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">User name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter a user name" value="{{ $user->name }}" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">User email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter a user email" value="{{ $user->email }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">User password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter a user password" value="{{ $user->password }}" id="password">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">User image :</label>
            <div>If you wanna change the picture press it :</div>
            <input type="file" class="form-control" id="image" name="image" style="display: none">
            <label for="image" class="form-label"><img src="/assets/images/users/{{ $user->image }}" class="card-img-top image" alt="..."></label>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="is_admin" class="form-label">User Role :</label>
                <select class="form-select" name="is_admin" id="is_admin" multiple aria-label="multiple select example">
                    <option>What is the role :</option>
                    <option value="1"
                    @if ($user->is_admin == '1')

                        selected
                    @endif
                    >admin</option>
                    <option value="0" 
                    @if ($user->is_admin == '0')
                    selected
                    @endif
                    >user</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">send</button>
    </form>
@endsection
