<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\BlockchainController;
use App\Http\Controllers\Controller;
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

        return view('doctor.clinical_note.index', compact('clinicalNotes'));
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

        if (isset($request['share_in_blockchain'])) {
            $validatedData['assessment_datetime'] = now()->format('Y-m-d H:i:s');
            $validatedData['patient_name'] = User::findOrFail($validatedData['patient_id'])->name;
            $validatedData['doctor_name'] = Auth::user()->name;

            $blockchainData = [
                'data' => $validatedData,
            ];

            $this->blockchainController->addBlock($blockchainData);
        } else {
            ClinicalNote::create($validatedData);
        }

        return redirect()->route('doctor.clinical-note.create')->with('success', 'Clinical notes added!');
    }
}
