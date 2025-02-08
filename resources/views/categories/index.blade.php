@extends('layouts.app')
@section('title', 'categories')
@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary mx-2 mt-5">create a new category</a>
    <div class="container1">
        @if (!$categories->isEmpty())
        @foreach ($categories as $category)
            <div class="card mx-2 mt-3" style="width: 18rem;">
                <img src="/assets/images/categories/{{ $category->image }}" class="card-img-top hieght" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->title }}</h5>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">show</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary">edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirmDelete();" type="submit" class="btn btn-danger">delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <p class="mx-2">There are no categories to show</p>
@endif
@endsection
