@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Student Report</h2>

    <!-- Filter -->
    <form method="GET" action="{{ route('reports.students') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Search by Student Name" value="{{ request('name') }}">
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
                <th>Name</th>
                <th>Class</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $key => $student)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->contact }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
