@extends('layouts.app')
@section('content')
<h3>Schedule Appointment</h3>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    <div>
        <label>Patient</label>
        <select name="patient_id">
            @foreach($patients as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Doctor</label>
        <select name="doctor_id">
            @foreach($doctors as $d)
                <option value="{{ $d->id }}">{{ $d->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Date</label>
        <input type="datetime-local" name="appointment_date" value="{{ old('appointment_date') }}">
    </div>
    <div>
        <label>Status</label>
        <input type="text" name="status" value="{{ old('status','pending') }}">
    </div>

    <button type="submit">Save</button>
</form>

@endsection