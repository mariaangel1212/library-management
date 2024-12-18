@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Transaction</h2>

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $transaction->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Book</label>
            <select name="book_id" class="form-control" required>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ $transaction->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Borrow Date</label>
            <input type="date" name="borrow_date" value="{{ $transaction->borrow_date }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Return Date</label>
            <input type="date" name="return_date" value="{{ $transaction->return_date }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
