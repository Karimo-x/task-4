@extends('layouts.app')
@section('title', 'tags')
@section('content')
    <a href="{{ route('tags.create') }}" class="btn btn-primary mx-5 mt-5">add Tag</a>
    <h3 class="mx-5 mt-3">Available Tags :</h3>
    @if (!$tags->isEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tag Name</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td> <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-primary">Show</a></td>
                        <td> <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-secondary">Edit</a></td>
                        <td>
                            <form action="{{ route('tags.destroy' , $tag->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirmDelete();" type="submit" class="btn btn-danger">Delete</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="mx-5">There are no tags to show</p>
    @endif
@endsection
