@extends('layouts.app')
@section('content')
<h2>List of Patients</h2>
<a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
        <tr>
            <td>{{ $patient->student_id }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->course }}</td>
            <td>{{ $patient->year_level }}</td>
            <td>
                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete patient?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection