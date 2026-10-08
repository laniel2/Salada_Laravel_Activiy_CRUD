@extends('layouts.app')
@section('content')
<div class="container mt-4">
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
        <div class="mb-3">
            <label class="form-label">Patient</label>
            <select name="patient_id" class="form-select">
                @foreach($patients as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $appointment->patient_id ? 'selected' : '' }}>{{ $p->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Doctor</label>
            <select name="doctor_id" class="form-select">
                @foreach($doctors as $d)
                    <option value="{{ $d->id }}" {{ $d->id == $appointment->doctor_id ? 'selected' : '' }}>{{ $d->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="datetime-local" name="appointment_date" class="form-control" value="{{ old('appointment_date', \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\\TH:i')) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $appointment->status) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection