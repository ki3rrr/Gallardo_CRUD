<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CrudFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    public function test_patient_crud_routes_work(): void
    {
        $response = $this->get('/patients/create');
        $response->assertOk();

        $response = $this->post('/patients', [
            'student_id' => 'P-1001',
            'name' => 'Alice Johnson',
            'course' => 'Computer Science',
            'year_level' => 2,
        ]);

        $response->assertRedirect('/patients');
        $this->assertDatabaseHas('patients', [
            'student_id' => 'P-1001',
            'name' => 'Alice Johnson',
            'course' => 'Computer Science',
            'year_level' => 2,
        ]);

        $patient = Patient::first();

        $response = $this->put("/patients/{$patient->id}", [
            'student_id' => 'P-1001',
            'name' => 'Alice Smith',
            'course' => 'Information Technology',
            'year_level' => 3,
        ]);

        $response->assertRedirect('/patients');
        $this->assertDatabaseHas('patients', [
            'id' => $patient->id,
            'name' => 'Alice Smith',
            'course' => 'Information Technology',
            'year_level' => 3,
        ]);

        $response = $this->delete("/patients/{$patient->id}");
        $response->assertRedirect('/patients');
        $this->assertDatabaseMissing('patients', ['id' => $patient->id]);
    }

    public function test_appointment_crud_routes_work(): void
    {
        $doctor = Doctor::factory()->create();
        $patient = Patient::create([
            'student_id' => 'P-2001',
            'name' => 'Bob Cruz',
            'course' => 'Nursing',
            'year_level' => 4,
        ]);

        $response = $this->get('/appointments/create');
        $response->assertOk();

        $response = $this->post('/appointments', [
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'appointment_date' => '2026-10-15',
            'status' => 'Scheduled',
        ]);

        $response->assertRedirect('/appointments');
        $this->assertDatabaseHas('appointments', [
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'status' => 'Scheduled',
        ]);

        $appointment = $patient->appointments()->first();

        $response = $this->put("/appointments/{$appointment->id}", [
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'appointment_date' => '2026-10-20',
            'status' => 'Completed',
        ]);

        $response->assertRedirect('/appointments');
        $this->assertDatabaseHas('appointments', [
            'id' => $appointment->id,
            'appointment_date' => '2026-10-20',
            'status' => 'Completed',
        ]);

        $response = $this->delete("/appointments/{$appointment->id}");
        $response->assertRedirect('/appointments');
        $this->assertDatabaseMissing('appointments', ['id' => $appointment->id]);
    }
}
