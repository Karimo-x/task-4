@extends('layouts.app')
@section('title', 'update category')
@section('content')
    <h3 class="mx-5 my-3">Edit a category : </h3>
    <form  action="{{ route('categories.update' , $category->id) }}" class="login" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="title" class="form-label">Category name :</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category image :</label>
            <div>If you wanna change the picture press it :</div>
            <input type="file" class="form-control" id="image" name="image" style="display: none">
            <label for="image" class="form-label"><img src="/assets/images/categories/{{ $category->image }}" class="card-img-top image" alt="..."></label>
        </div>
        <button type="submit" class="btn btn-primary">send</button>
    </form>
@endsection
