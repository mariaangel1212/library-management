@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="mb-6">
        <ul>
            <li>Nama : Maria Angelina Handoko</li>
            <li>Kelas : Maria Angelina Handoko</li>
            <li>Matakuliah : Maria Angelina Handoko</li>
        </ul>
    </div>
    <!-- Filter -->
    <form method="GET" action="{{ route('reports.loans') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="student_name" class="form-control" placeholder="Search by Student Name" value="{{ request('student_name') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Report Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Student</th>
                <th>Book</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $key => $transaction)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $transaction->student->name }}</td>
                    <td>{{ $transaction->book->title }}</td>
                    <td>{{ $transaction->borrow_date }}</td>
                    <td>{{ $transaction->return_date ?? 'Not Returned' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
