@extends('layouts.app')
@section('content')
<h2>List of Patients</h2>
    <div>
        @foreach ($patients as $patient )
            <p>Patient Name: {{ $patient->name }}</p>
        @endforeach
        
    </div>

@endsection