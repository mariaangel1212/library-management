@extends('layouts.app')
@section('header')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Books List
        </h2>
    </div>
</header>
@endsection
@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $key => $book)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
