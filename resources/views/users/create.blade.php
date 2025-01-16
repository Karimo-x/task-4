@extends('layouts.app')
@section('title', 'create user')
@section('content')
    <h3 class="mx-5 my-3">add a new user :</h3>
    <form action="{{ route('users.store') }}" method="POST" class="login" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">User name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter a user name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">User email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter a user email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">User password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter a user password" id="password">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">User image</label>
            <input type="file" class="form-control" name="image" placeholder="Enter a user image" id="image">
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="is_admin" class="form-label">User Role :</label>
                <select class="form-select" name="is_admin" id="is_admin" multiple aria-label="multiple select example">
                    <option selected>What is the role :</option>
                    <option value="1">admin</option>
                    <option value="0" >user</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">send</button>
    </form>
@endsection
