@extends('layouts.app')

@section('title', 'Patient Details')

@section('content')
    <div class="container py-4">
        <h4>Patient Details</h4>

        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Student ID:</strong> {{ $patient->student_id }}</p>
                <p><strong>Name:</strong> {{ $patient->name }}</p>
                <p><strong>Course:</strong> {{ $patient->course }}</p>
                <p><strong>Year Level:</strong> {{ $patient->year_level }}</p>
            </div>
        </div>

        <a href="{{ route('patients.index') }}" class="btn btn-secondary mt-3">Back to Patients</a>
    </div>
@endsection
