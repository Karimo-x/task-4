@extends('layouts.app')
@section('title', 'show catogory')
@section('content')
    <div class="card text-center login">
        <div class="card-header">
            Category information
        </div>
        <div class="card-body">
            <h5 class="card-title"> {{ $category->title }}</h5>
            <img src="/assets/images/categories/{{ $category->image }}" class="card-img-top image" alt="...">
            <p class="card-text">Created at : {{ $category->created_at }}</p>
            <p class="card-text">Updated at : {{ $category->updated_at }}</p>

            <a href="{{ route('categories.index') }}" class="btn btn-primary">back to => </a>
        </div>
        <div class="card-footer text-muted">
            Category information
        </div>
    </div>
@endsection
