<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\BlockchainController;
use App\Http\Controllers\Controller;
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

        return view('doctor.labortory-test-result.index', compact('labTestResults'));
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

        if (isset($request['share_in_blockchain'])) {
            $validatedData['patient_name'] = User::findOrFail($validatedData['patient_id'])->name;
            $validatedData['doctor_name'] = Auth::user()->name;
            $validatedData['record_type'] = "labortory_test_results";

            $blockchainData = [
                'data' => $validatedData,
            ];

            $this->blockchainController->addBlock($blockchainData);
        } else {
            LabortoryTestResult::create($validatedData);
        }

        return redirect()->route('doctor.labortory-result.create')->with('success', 'Lab results added!');
    }
}
