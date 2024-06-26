<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BlockchainController;
use App\Models\Blockchain;
use App\Models\ImmunizationRecord;
use App\Models\User;

class ImmunizationRecordController extends Controller
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
        $immunizationRecords = ImmunizationRecord::where('immunization_provider_id', Auth::user()->id)->get();
        $recipientList = User::where('id', '!=', auth()->user()->id)->get(['id', 'name']);

        return view('doctor.immunization.index', compact('immunizationRecords'), compact('recipientList'));
    }
    /**
     * Show clinical note form.
     */
    public function create()
    {
        $patients = User::where('role', '0')->get(['id', 'name']);

        return view('doctor.immunization.create', compact('patients'));
    }

    /**
     * Store clinical note into database.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_of_immunization' => 'nullable|date',
            'vaccine_name' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'lot_number' => 'nullable|string|max:255',
            'dose_number' => 'nullable|string|max:255',
            'administration_route' => 'nullable|string|max:255',
            'anatomical_site' => 'nullable|string|max:255',
            'adverse_reaction' => 'nullable|string|max:255',
            'next_due_date' => 'nullable|date',
            'vaccination_status' => 'nullable|string|max:255',
            'contraindications' => 'nullable|string',
            'patient_consent' => 'nullable|string|max:255',
            'vaccination_schedule' => 'nullable|string',
            'patient_id' => 'required|exists:users,id'
        ]);

        $validatedData['immunization_provider_id'] = Auth::user()->id;

        $immunizationRecord = ImmunizationRecord::create($validatedData);

        if (isset($request['share_in_blockchain'])) {
            $validatedData['patient_name'] = User::findOrFail($validatedData['patient_id'])->name;
            $validatedData['immunization_provider_name'] = Auth::user()->name;
            $validatedData['record_type'] = "immunization_records";

            $blockchainData = [
                'data' => $validatedData,
            ];

            $block = $this->blockchainController->addBlock($blockchainData);
        }

        $immunizationRecord->update([
            'global_hash' => route('doctor.immunization.view', ['hash' => $block['current_hash']]),
        ]);

        return redirect()->route('doctor.immunization.create')->with('success', 'Immunization record added!');
    }

    /**
     * Share vital results with recipient.
     */

    public function share($id, Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
        ]);

        // Prepare data to store in blockchain
        $data = ImmunizationRecord::findOrFail($id);
        $recipient = User::findOrFail($request->recipient_id);
        $data['patient_name'] = $recipient->name;
        $data['immunization_provider_name'] = Auth::user()->name;
        $data['record_type'] = "immunization_records";

        $blockchainData = [
            'data' => $data,
            'recipientPublicKey' => Blockchain::getUserPublicKey($recipient->uuid, $recipient->role),
        ];

        $block = $this->blockchainController->addBlock($blockchainData);

        ImmunizationRecord::findOrFail($id)->update([
            'hash_value' => route('doctor.immunization.view', ['hash' => $block['current_hash']]),
        ]);

        return redirect()->route('doctor.immunization.index')->with('success', 'Immunization Record shared!');
    }

    /**
     * View from blockchain
     * 
     */
    public function view($current_hash)
    {
        $searchedBlock = $this->blockchainController->getBlock($current_hash);
        $data = json_decode($searchedBlock['decrypted_data']);

        return view('doctor.immunization.view', compact('data'));
    }
}
