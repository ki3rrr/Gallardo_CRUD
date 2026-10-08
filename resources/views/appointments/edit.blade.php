@extends('layouts.app')

@section('title', 'Edit Appointment')

@section('content')
    <div class="container py-4">
        <h4>Edit Appointment</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
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
                <label for="patient_id" class="form-label">Patient</label>
                <select class="form-select" name="patient_id">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ old('patient_id', $appointment->patient_id) == $patient->id ? 'selected' : '' }}>
                            {{ $patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="doctor_id" class="form-label">Doctor</label>
                <select class="form-select" name="doctor_id">
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ old('doctor_id', $appointment->doctor_id) == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="appointment_date" class="form-label">Appointment Date</label>
                <input type="date" class="form-control" name="appointment_date" value="{{ old('appointment_date', $appointment->appointment_date) }}">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status">
                    @foreach(['Scheduled', 'Confirmed', 'Completed', 'Cancelled'] as $status)
                        <option value="{{ $status }}" {{ old('status', $appointment->status) == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Appointment</button>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
