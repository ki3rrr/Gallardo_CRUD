@extends('layouts.app')

@section('title', 'List of Patients')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">List of Patients</h3>
            <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>
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
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <td>{{ $patient->student_id }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->course }}</td>
                            <td>{{ $patient->year_level }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this patient?')">
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
