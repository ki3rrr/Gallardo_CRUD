@extends('layouts.app')

@section('title', 'List of Appointments')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">List of Appointments</h3>
            <a href="{{ route('appointments.create') }}" class="btn btn-primary">Add Appointment</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
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
                            <td>{{ $appointment->patient?->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->doctor?->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $appointment->status }}</span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
