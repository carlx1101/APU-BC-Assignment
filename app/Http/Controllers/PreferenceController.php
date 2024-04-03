<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preferences = Preference::all();
        return view('patient.preferences.index', compact('preferences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.preferences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:users,id',
            'hobbies' => 'required|string|max:255',
            'sports' => 'required|string|max:255',
            'languages' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Preference::create($request->all());
        return redirect()->route('preferences.index')->with('success', 'Preference created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Preference $preference)
    {
        return view('patient.preferences.show', compact('preference'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Preference $preference)
    {
        return view('patient.preferences.edit', compact('preference'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Preference $preference)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:users,id',
            'hobbies' => 'required|string|max:255',
            'sports' => 'required|string|max:255',
            'languages' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $preference->update($request->all());

        return redirect()->route('preferences.index')->with('success', 'Preference updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Preference $preference)
    {
        $preference->delete();
        return redirect()->route('preferences.index')->with('success', 'Preference deleted successfully.');
    }
}