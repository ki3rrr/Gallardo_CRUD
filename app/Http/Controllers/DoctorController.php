<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        Doctor::create([
            'name' => $request->name,
            'specialization' => $request->specialization,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()
        ->route('doctors.index')
        ->with('success', 'Doctor added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
         $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

          $doctor->update([
            'name' => $request->name,
            'specialization' => $request->specialization,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()
        ->route('doctors.index')
        ->with('success', 'Doctor updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()
        ->route('doctors.index')
        ->with('success', 'Doctor deleted successfully.');
    }
}
