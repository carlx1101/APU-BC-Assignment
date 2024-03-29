<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\BranchDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branchDoctors = BranchDoctor::with(['branch', 'doctor'])->get();

        // dd($branchDoctors);
        return view('admin.doctors.index', compact('branchDoctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        return view('admin.doctors.create', compact('branches'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           // Validate the incoming request data
           $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'branch_id' => 'required|exists:branches,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user with a default password and assign them to the branch
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make('123456'), // Set a default password
            'role' => 2, // Assuming '2' is the identifier for a doctor role
        ]);

        // After the user is created, create the relationship in BranchDoctor
        $branchDoctor = BranchDoctor::create([
            'doctor_id' => $user->id,
            'branch_id' => $request->input('branch_id'),
        ]);

        // Redirect to a given route with a success message
        return redirect()->route('doctors.index')->with('success', 'Doctor has been added successfully and assigned to the branch.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branchDoctor = BranchDoctor::with(['branch', 'doctor'])->findOrFail($id);


        $branches = Branch::all();

        return view('admin.doctors.edit', compact('branchDoctor', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $doctor_id)
    {
        // Find the first BranchDoctor record that matches the given doctor_id
        $branchDoctor = BranchDoctor::where('doctor_id', $doctor_id)->firstOrFail();

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $branchDoctor->doctor_id,
            'branch_id' => 'required|exists:branches,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Assuming the doctor information is stored in the users table
        // Update the user information
        $user = User::findOrFail($branchDoctor->doctor_id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Update the branch assignment
        $branchDoctor->update([
            'branch_id' => $request->input('branch_id'),
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor assignment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branchDoctor = BranchDoctor::findOrFail($id);
        $user = User::findOrFail($branchDoctor->doctor_id);

        $user->delete();
        $branchDoctor->delete();

        return redirect()->back()->with('success', 'Doctor and their assignment removed successfully.');
    }
}
