@extends('layouts.app')
@section('content')
<h3>Edit Appointment</h3>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Patient</label>
        <select name="patient_id">
            @foreach($patients as $p)
                <option value="{{ $p->id }}" {{ $p->id == $appointment->patient_id ? 'selected' : '' }}>{{ $p->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Doctor</label>
        <select name="doctor_id">
            @foreach($doctors as $d)
                <option value="{{ $d->id }}" {{ $d->id == $appointment->doctor_id ? 'selected' : '' }}>{{ $d->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Date</label>
        <input type="datetime-local" name="appointment_date" value="{{ old('appointment_date', \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\\TH:i')) }}">
    </div>
    <div>
        <label>Status</label>
        <input type="text" name="status" value="{{ old('status', $appointment->status) }}">
    </div>

    <button type="submit">Update</button>
</form>

@endsection