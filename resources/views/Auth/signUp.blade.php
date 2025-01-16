@extends('layouts.app')
@section('title', 'sign in')
@section('content')
    <h4 class="mx-5 my-3"> Please Enter your information to sign up :</h4>
    <form action="{{ route('signup') }}" method="POST" class="login" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">User name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter a user name"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">User email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter a user email"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">User password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter a user password" id="password">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">User image</label>
            <input type="file" class="form-control" name="image" placeholder="Enter a user image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">send</button>
    </form>
@endsection
