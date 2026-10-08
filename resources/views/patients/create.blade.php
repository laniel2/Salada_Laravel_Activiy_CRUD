@extends('layouts.app')
@section('content')
<h3>Add Patient</h3>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('patients.store') }}" method="POST">
    @csrf
    <div>
        <label>Student ID</label>
        <input type="text" name="student_id" value="{{ old('student_id') }}">
    </div>
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label>Course</label>
        <input type="text" name="course" value="{{ old('course') }}">
    </div>
    <div>
        <label>Year Level</label>
        <input type="text" name="year_level" value="{{ old('year_level') }}">
    </div>

    <button type="submit">Save</button>
</form>

@endsection