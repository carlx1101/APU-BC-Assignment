<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\BlockchainController;
use App\Http\Controllers\Controller;
use App\Models\Blockchain;
use App\Models\User;
use App\Models\VitalResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VitalResultController extends Controller
{
    protected $blockchainController;

    public function __construct(BlockchainController $blockchainController)
    {
        $this->blockchainController = $blockchainController;
    }

    /**
     * Show Vital Results dashboard.
     */
    public function index()
    {
        $vitalResults = VitalResult::all();
        $recipientList = User::where('id', '!=', auth()->user()->id)->get(['id', 'name']);

        return view('doctor.vital-result.index', compact('vitalResults'), compact('recipientList'));
    }
    /**
     * Show clinical note form.
     */
    public function create()
    {
        $patients = User::where('role', '0')->get(['id', 'name']);

        return view('doctor.vital-result.create', compact('patients'));
    }

    /**
     * Store clinical note into database.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'blood_pressure' => 'nullable|integer',
            'heart_rate' => 'nullable|integer',
            'respiratory_rate' => 'nullable|integer',
            'temperature' => 'nullable|numeric|between:-999.99,999.99',
            'oxygen_saturation' => 'nullable|numeric|between:-999.99,999.99',
            'weight' => 'nullable|numeric|between:-999.99,999.99',
            'height' => 'nullable|numeric|between:-999.99,999.99',
            'BMI' => 'nullable|numeric|between:-999.99,999.99',
            'patient_id' => 'required|exists:users,id'
        ]);

        $validatedData['measurement_datetime'] = now();

        $vitalResult = VitalResult::create($validatedData); // Store in Database

        // Store in blockchain
        $validatedData['measurement_datetime'] = now()->format('Y-m-d H:i:s');
        $validatedData['patient_name'] = User::findOrFail($validatedData['patient_id'])->name;
        $validatedData['record_type'] = "vital_results";

        $blockchainData = [
            'data' => $validatedData,
        ];

        $block = $this->blockchainController->addBlock($blockchainData);

        $vitalResult->update([
            'global_hash' => route('doctor.vital-result.view', ['hash' => $block['current_hash']]),
        ]);

        return redirect()->route('doctor.vital-result.create')->with('success', 'Vital record added!');
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
        $data = VitalResult::findOrFail($id);
        $recipient = User::findOrFail($request->recipient_id);
        $data['patient_name'] = $recipient->name;
        $data['doctor_name'] = Auth::user()->name;
        $data['record_type'] = "vital_results";

        $blockchainData = [
            'data' => $data,
            'recipientPublicKey' => Blockchain::getUserPublicKey($recipient->uuid, $recipient->role),
        ];

        $block = $this->blockchainController->addBlock($blockchainData);

        VitalResult::findOrFail($id)->update([
            'hash_value' => route('doctor.vital-result.view', ['hash' => $block['current_hash']]),
        ]);

        return redirect()->route('doctor.vital-result.index')->with('success', 'Vital Record shared!');
    }

    /**
     * View from blockchain
     * 
     */
    public function view($current_hash)
    {
        $searchedBlock = $this->blockchainController->getBlock($current_hash);
        $data = json_decode($searchedBlock['decrypted_data']);

        return view('doctor.vital-result.view', compact('data'));
    }
}
