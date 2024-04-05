<?php

namespace App\Http\Controllers;

use App\Models\Blockchain;
use App\Models\MedicalHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalHistoryController extends Controller
{
    protected $blockchainController;

    public function __construct(BlockchainController $blockchainController)
    {
        $this->blockchainController = $blockchainController;
    }

    /**
     * Show clinical note dashboard.
     */
    public function index()
    {
        $medicalHistories = MedicalHistory::where('patient_id', Auth::user()->id)->get();
        $recipientList = User::where('id', '!=', auth()->user()->id)->get(['id', 'name']);

        return view('patient.medical-history.index', compact('medicalHistories'), compact('recipientList'));
    }
    /**
     * Show clinical note form.
     */
    public function create()
    {
        return view('patient.medical-history.create');
    }

    /**
     * Store clinical note into database.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'diagnosis_record' => 'nullable|string|max:500',
            'treatment_details' => 'nullable|string|max:500',
            'surgery' => 'nullable|string|max:500',
            'hospitalization_history' => 'nullable|string|max:500',
            'chronic_conditions' => 'nullable|string|max:500',
            'family_medical_history' => 'nullable|string|max:500',
        ]);

        $validatedData['patient_id'] = auth()->user()->id;

        $clinicalNote = MedicalHistory::create($validatedData); // Create the record

        if (isset($request['share_in_blockchain'])) {
            $validatedData['patient_name'] = Auth::user()->name;
            $validatedData['record_type'] = "medical_histories";

            $blockchainData = [
                'data' => $validatedData,
            ];

            $block = $this->blockchainController->addBlock($blockchainData);
            $clinicalNote->update([
                'global_hash' => route('patient.medical-history.view', ['hash' => $block['current_hash']]),
            ]);
        }

        return redirect()->route('patient.medical-history.create')->with('success', 'Medical history record added!');
    }

    /**
     * Share clinical note with recipient.
     */

    public function share($id, Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
        ]);

        // Prepare data to store in blockchain
        $data = MedicalHistory::findOrFail($id);
        $recipient = User::findOrFail($request->recipient_id);
        $data['recipient_name'] = $recipient->name;
        $data['sender_name'] = Auth::user()->name;
        $data['record_type'] = "medical_histories";

        $blockchainData = [
            'data' => $data,
            'recipientPublicKey' => Blockchain::getUserPublicKey($recipient->uuid, $recipient->role),
        ];

        $block = $this->blockchainController->addBlock($blockchainData);

        MedicalHistory::findOrFail($id)->update([
            'hash_value' => route('patient.medical-history.view', ['hash' => $block['current_hash']]),
        ]);

        return redirect()->route('patient.medical-history.index')->with('success', 'Clinical note shared!');
    }

    /**
     * View from blockchain
     * 
     */
    public function view($current_hash)
    {
        $searchedBlock = $this->blockchainController->getBlock($current_hash);
        $data = json_decode($searchedBlock['decrypted_data']);

        return view('patient.medical-history.view', compact('data'));
    }
}
