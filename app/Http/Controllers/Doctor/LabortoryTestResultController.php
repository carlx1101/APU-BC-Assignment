<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\BlockchainController;
use App\Http\Controllers\Controller;
use App\Models\Blockchain;
use App\Models\LabortoryTestResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabortoryTestResultController extends Controller
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
        $labTestResults = LabortoryTestResult::where('physician_attendant_id', Auth::user()->id)->get();
        $recipientList = User::where('id', '!=', auth()->user()->id)->get(['id', 'name']);

        return view('doctor.labortory-test-result.index', compact('labTestResults'), compact('recipientList'));
    }
    /**
     * Show clinical note form.
     */
    public function create()
    {
        $patients = User::where('role', '0')->get(['id', 'name']);

        return view('doctor.labortory-test-result.create', compact('patients'));
    }

    /**
     * Store clinical note into database.
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'test_type' => 'nullable|string|max:500',
            'test_date' => 'nullable|date',
            'test_result' => 'nullable|string|max:500',
            'reference_range' => 'nullable|string|max:500',
            'testing_facility' => 'nullable|string|max:500',
            'interpretation' => 'nullable|string|max:500',
            'patient_id' => 'required|exists:users,id',
        ]);

        $validatedData['physician_attendant_id'] = Auth::user()->id;

        $labResult = LabortoryTestResult::create($validatedData);

        if (isset($request['share_in_blockchain'])) {
            $validatedData['patient_name'] = User::findOrFail($validatedData['patient_id'])->name;
            $validatedData['physician_attendant_name'] = Auth::user()->name;
            $validatedData['record_type'] = "labortory_test_results";

            $blockchainData = [
                'data' => $validatedData,
            ];

            $block = $this->blockchainController->addBlock($blockchainData);

            $labResult->update([
                'global_hash' => route('doctor.labortory-result.view', ['hash' => $block['current_hash']]),
            ]);
        }

        return redirect()->route('doctor.labortory-result.create')->with('success', 'Lab results added!');
    }

    /**
     * Share lab results with recipient.
     */

    public function share($id, Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
        ]);

        // Prepare data to store in blockchain
        $data = LabortoryTestResult::findOrFail($id);
        $recipient = User::findOrFail($request->recipient_id);
        $data['patient_name'] = $recipient->name;
        $data['physician_attendant_name'] = Auth::user()->name;
        $data['record_type'] = "labortory_test_results";

        $blockchainData = [
            'data' => $data,
            'recipientPublicKey' => Blockchain::getUserPublicKey($recipient->uuid, $recipient->role),
        ];

        $block = $this->blockchainController->addBlock($blockchainData);

        LabortoryTestResult::findOrFail($id)->update([
            'hash_value' => route('doctor.labortory-result.view', ['hash' => $block['current_hash']]),
        ]);

        return redirect()->route('doctor.labortory-result.index')->with('success', 'Lab test record shared!');
    }

    /**
     * View from blockchain
     * 
     */
    public function view($current_hash)
    {
        $searchedBlock = $this->blockchainController->getBlock($current_hash);
        $data = json_decode($searchedBlock['decrypted_data']);

        return view('doctor.labortory-test-result.view', compact('data'));
    }
}
