@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h3>Appointment Details</h3>

    <div class="card">
        <div class="card-body">
            <p><strong>Patient:</strong> {{ $appointment->patient->name ?? '-' }}</p>
            <p><strong>Doctor:</strong> {{ $appointment->doctor->name ?? '-' }}</p>
            <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
            <p><strong>Status:</strong> {{ $appointment->status }}</p>
        </div>
    </div>

    <a href="{{ route('appointments.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection