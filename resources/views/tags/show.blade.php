@extends('Auth.login')
@section('title', 'show tag')
@section('content')
<h3 class="mx-5 mt-3">Show tag :</h3>
    <div class="card mx-5 my-5" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Tag Information</h5>
            <h6 class="card-subtitle mb-2 text-muted">Name : {{ $tag->name }}</h6>
            <p class="card-text">Created at : {{ $tag->created_at }}</p>
            <p class="card-text">Update at : {{ $tag->updated_at }}</p>
            <a href="{{ route('tags.index') }}" class="card-link btn btn-primary">Back to =></a>
        </div>
    </div>
@endsection
