@extends('Auth.login')
@section('title', 'create tag')
@section('content')
<h3 class="mx-5 mt-3">Add a new tag :</h3>
    <form class="login" method="POST" action="{{ route('tags.store') }}">
        @csrf
        <div class="mb-3">
            <div class="mb-3">
                <label for="name" class="form-label">Tag Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter tag name">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection
