@extends('layouts.app')
@section('content')
<h3>Edit Patient</h3>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('patients.update', $patient->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Student ID</label>
        <input type="text" name="student_id" value="{{ old('student_id', $patient->student_id) }}">
    </div>
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $patient->name) }}">
    </div>
    <div>
        <label>Course</label>
        <input type="text" name="course" value="{{ old('course', $patient->course) }}">
    </div>
    <div>
        <label>Year Level</label>
        <input type="text" name="year_level" value="{{ old('year_level', $patient->year_level) }}">
    </div>

    <button type="submit">Update</button>
</form>

@endsection