@extends('layouts.app')
@section('title', 'show user')
@section('content')
<h3 class="mx-5 my-3">User Information : </h3>
<div class="card login">
    <h5 class="card-header">Name : {{ $user->name }}</h5>
    <img src="/assets/images/users/{{ $user->image }}" alt="user image" class="image">
    <div class="card-body">
        <h5 class="card-title">Email : {{ $user->email }}</h5>
        <p class="card-text"> Created at : {{ $user->created_at }}</p>
        <p class="card-text"> Updated at : {{ $user->updated_at }}</p>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back to =></a>
    </div>
</div>
@endsection
