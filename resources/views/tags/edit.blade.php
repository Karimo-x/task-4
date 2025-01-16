@extends('Auth.login')
@section('title', 'Edit tag')
@section('content')
<h3 class="mx-5 mt-3">Update tag :</h3>
    <form action="{{ route('tags.update' , $tag->id) }}" class="login" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <div class="mb-3">
                <label for="name" class="form-label">Tag Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter tag name" value="{{ $tag->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection
