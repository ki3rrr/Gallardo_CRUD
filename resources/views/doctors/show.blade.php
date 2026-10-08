@extends('layouts.app')

@section('title', 'Doctor Details')

@section('content')
    <div class="container py-4">
        <h4>Doctor Details</h4>

        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $doctor->name }}</p>
                <p><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
                <p><strong>Email:</strong> {{ $doctor->email }}</p>
                <p><strong>Phone:</strong> {{ $doctor->phone }}</p>
            </div>
        </div>

        <a href="{{ route('doctors.index') }}" class="btn btn-secondary mt-3">Back to Doctors</a>
    </div>
@endsection
