@extends('layouts.app')

@section('title', 'Appointment Details')

@section('content')
    <div class="container py-4">
        <h4>Appointment Details</h4>

        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Patient:</strong> {{ $appointment->patient?->name ?? 'N/A' }}</p>
                <p><strong>Doctor:</strong> {{ $appointment->doctor?->name ?? 'N/A' }}</p>
                <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
                <p><strong>Status:</strong> {{ $appointment->status }}</p>
            </div>
        </div>

        <a href="{{ route('appointments.index') }}" class="btn btn-secondary mt-3">Back to Appointments</a>
    </div>
@endsection
