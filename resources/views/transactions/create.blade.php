@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Add New Transaction</h2>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Book</label>
            <select name="book_id" class="form-control" required>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Borrow Date</label>
            <input type="date" name="borrow_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Return Date</label>
            <input type="date" name="return_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
