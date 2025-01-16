@extends('layouts.app')
@section('title', 'create category')
@section('content')
    <h3>create a category : </h3>
    <form  action="{{ route('categories.store') }}" class="login" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Category name</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category image</label>
            <input type="file" class="form-control" id="image" name="image" >
        </div>
        <button type="submit" class="btn btn-primary">send</button>
    </form>
@endsection
