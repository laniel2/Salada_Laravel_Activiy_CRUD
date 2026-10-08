<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('doctors.index') }}">Doctors</a>
    <a href="{{ route('patients.index') }}">Patients</a>
    <a href="{{ route('appointments.index') }}">Appointments</a>
  
  <a href="{{ route('appointments.create') }}" class="btn btn-primary">New Appointment</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($appointments as $appointment)
        <tr>
            <td>{{ $appointment->patient->name ?? '-' }}</td>
            <td>{{ $appointment->doctor->name ?? '-' }}</td>
            <td>{{ $appointment->appointment_date }}</td>
            <td>{{ $appointment->status }}</td>
            <td>
                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete appointment?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>