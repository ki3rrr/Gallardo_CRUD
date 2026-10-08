@extends('layouts.app')

@section('title', 'Add Appointment')

@section('content')
    <div class="container py-4">
        <h4>Add Appointment</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient</label>
                <select class="form-select" name="patient_id">
                    <option value="">Select patient</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                            {{ $patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="doctor_id" class="form-label">Doctor</label>
                <select class="form-select" name="doctor_id">
                    <option value="">Select doctor</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="appointment_date" class="form-label">Appointment Date</label>
                <input type="date" class="form-control" name="appointment_date" value="{{ old('appointment_date') }}">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="">Select status</option>
                    <option value="Scheduled" {{ old('status') == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="Confirmed" {{ old('status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Appointment</button>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
