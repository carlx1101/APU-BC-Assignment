<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\BlockchainController;
use App\Http\Controllers\Controller;
use App\Models\Blockchain;
use App\Models\ClinicalNote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicalNoteController extends Controller
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
        $clinicalNotes = ClinicalNote::where('doctor_id', Auth::user()->id)->get();
        $recipientList = User::where('id', '!=', auth()->user()->id)->get(['id', 'name']);

        return view('doctor.clinical_note.index', compact('clinicalNotes'), compact('recipientList'));
    }
    /**
     * Show clinical note form.
     */
    public function create()
    {
        $patients = User::where('role', '0')->get(['id', 'name']);

        return view('doctor.clinical_note.create', compact('patients'));
    }

    /**
     * Store clinical note into database.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'diagnosis'              => 'nullable|string|max:500',
            'treatment_plan'         => 'nullable|string|max:500',
            'follow_up_recommendations' => 'nullable|string|max:500',
            'referrals'              => 'nullable|string|max:500',
            'patient_education'      => 'nullable|string|max:500',
            'procedures'             => 'nullable|string|max:500',
            'assessment_findings'    => 'nullable|string|max:500',
            'risks_management'       => 'nullable|string|max:500',
            'patient_id'             => 'required|exists:users,id',
        ]);

        $validatedData['assessment_datetime'] = now();
        $validatedData['doctor_id'] = Auth::user()->id;

        $clinicalNote = ClinicalNote::create($validatedData); // Create the record

        if (isset($request['share_in_blockchain'])) {
            $validatedData['assessment_datetime'] = now()->format('Y-m-d H:i:s');
            $validatedData['patient_name'] = User::findOrFail($validatedData['patient_id'])->name;
            $validatedData['doctor_name'] = Auth::user()->name;
            $validatedData['record_type'] = "medication_records";

            $blockchainData = [
                'data' => $validatedData,
            ];

            $block = $this->blockchainController->addBlock($blockchainData);
            $clinicalNote->update([
                'hash_value' => route('doctor.clinical-note.view', ['hash' => $block['current_hash']]),
            ]);
        }

        return redirect()->route('doctor.clinical-note.create')->with('success', 'Clinical notes added!');
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
        $data = ClinicalNote::findOrFail($id);
        $recipient = User::findOrFail($request->recipient_id);
        $data['patient_name'] = $recipient->name;
        $data['doctor_name'] = Auth::user()->name;
        $data['record_type'] = "medication_records";

        $blockchainData = [
            'data' => $data,
            'recipientPublicKey' => Blockchain::getUserPublicKey($recipient->uuid, $recipient->role),
        ];

        $block = $this->blockchainController->addBlock($blockchainData);

        ClinicalNote::findOrFail($id)->update([
            'hash_value' => route('doctor.clinical-note.view', ['hash' => $block['current_hash']]),
        ]);

        return redirect()->route('doctor.clinical-note.index')->with('success', 'Clinical note shared!');
    }

    /**
     * View from blockchain
     * 
     */
    public function view($current_hash)
    {
        $searchedBlock = $this->blockchainController->getBlock($current_hash);
        $data = json_decode($searchedBlock['decrypted_data']);

        return view('doctor.clinical_note.view', compact('data'));
    }
}
