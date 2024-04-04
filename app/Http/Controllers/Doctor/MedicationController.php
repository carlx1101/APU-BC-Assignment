<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\BlockchainController;
use App\Http\Controllers\Controller;
use App\Models\Blockchain;
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
        $recipientList = User::where('id', '!=', auth()->user()->id)->get(['id', 'name']);

        return view('doctor.medication.index', compact('medications'), compact('recipientList'));
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

        $medicationRecord = MedicationRecord::create($validatedData);

        if (isset($request['share_in_blockchain'])) {
            $validatedData['patient_name'] = User::findOrFail($validatedData['patient_id'])->name;
            $validatedData['doctor_name'] = Auth::user()->name;
            $validatedData['record_type'] = "medication_records";

            $blockchainData = [
                'data' => $validatedData,
            ];

            $block = $this->blockchainController->addBlock($blockchainData);

            $medicationRecord->update([
                'global_hash' => route('doctor.medication.view', ['hash' => $block['current_hash']]),
            ]);
        }

        return redirect()->route('doctor.medication.create')->with('success', 'Medication added!');
    }

    /**
     * Share medication with recipient.
     */

    public function share($id, Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
        ]);

        // Prepare data to store in blockchain
        $data = MedicationRecord::findOrFail($id);
        $recipient = User::findOrFail($request->recipient_id);
        $data['patient_name'] = $recipient->name;
        $data['doctor_name'] = Auth::user()->name;
        $data['record_type'] = "medication_records";

        $blockchainData = [
            'data' => $data,
            'recipientPublicKey' => Blockchain::getUserPublicKey($recipient->uuid, $recipient->role),
        ];

        $block = $this->blockchainController->addBlock($blockchainData);

        MedicationRecord::findOrFail($id)->update([
            'hash_value' => route('doctor.medication.view', ['hash' => $block['current_hash']]),
        ]);

        return redirect()->route('doctor.medication.index')->with('success', 'Medication record shared!');
    }

    /**
     * View from blockchain
     * 
     */
    public function view($current_hash)
    {
        $searchedBlock = $this->blockchainController->getBlock($current_hash);
        $data = json_decode($searchedBlock['decrypted_data']);

        return view('doctor.medication.view', compact('data'));
    }
}
