<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('patient.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $doctors = User::where('role', '2')->get();
        return view('patient.appointments.create', compact('branches', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:users,id',
            'branch_id' => 'required|exists:branches,id',
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required', // Ensure time is present
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Concatenate date and time
        $appointmentDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $request->appointment_date . ' ' . $request->appointment_time . ':00');

        // Create appointment
        Appointment::create([
            'patient_id' => $request->patient_id,
            'branch_id' => $request->branch_id,
            'doctor_id' => $request->doctor_id,
            'appointment_datetime' => $appointmentDateTime,
            'status' => $request->status,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return view('patient.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $branches = Branch::all();
        $doctors = User::where('role', 'doctor')->get();
        return view('patient.appointments.edit', compact('appointment', 'branches', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:users,id',
            'branch_id' => 'required|exists:branches,id',
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required', // Ensure time is present
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Concatenate date and time
        $appointmentDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $request->appointment_date . ' ' . $request->appointment_time . ':00');

        $appointment->update([
            'patient_id' => $request->patient_id,
            'branch_id' => $request->branch_id,
            'doctor_id' => $request->doctor_id,
            'appointment_datetime' => $appointmentDateTime,
            'status' => $request->status,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
