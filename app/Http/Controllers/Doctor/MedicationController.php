<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\BlockchainController;
use App\Http\Controllers\Controller;
use App\Models\MedicationRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicationController extends Controller
{

    protected $blockchainController;

    public function __construct(BlockchainController $blockchainController)
    {
        $this->blockchainController = $blockchainController;
    }

    public function index()
    {
        $medications = MedicationRecord::where('doctor_id', Auth::user()->id)->get();
        return view('doctor.medication.index', compact('medications'));
    }

    /**
     * Show Medication form.
     */
    public function create()
    {
        $patients = User::where('role', '0')->get(['id', 'name']);

        return view('doctor.medication.create', compact('patients'));
    }

    /**
     * Store clinical note into database.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'medication_name' => 'nullable|string|max:500',
            'dosage' => 'nullable|string|max:500',
            'frequency' => 'nullable|string|max:500',
            'start_date' => 'nullable|date|max:500',
            'end_date' => 'nullable|date|max:500',
            'patient_id' => 'required|exists:users,id',
        ]);

        $validatedData['doctor_id'] = Auth::user()->id;

        if (isset($request['share_in_blockchain'])) {
            $validatedData['patient_name'] = User::findOrFail($validatedData['patient_id'])->name;
            $validatedData['doctor_name'] = Auth::user()->name;
            $validatedData['record_type'] = "medication_records";

            $blockchainData = [
                'data' => $validatedData,
            ];

            $this->blockchainController->addBlock($blockchainData);
        } else {
            MedicationRecord::create($validatedData);
        }

        return redirect()->route('doctor.medication.create')->with('success', 'Medication added!');
    }
}
