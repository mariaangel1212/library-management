@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $student->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Class</label>
            <input type="text" name="class" value="{{ $student->class }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contact</label>
            <input type="text" name="contact" value="{{ $student->contact }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
