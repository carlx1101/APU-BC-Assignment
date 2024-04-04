<?php

use App\Http\Controllers\BlockchainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\Doctor\ClinicalNoteController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Doctor\ImmunizationRecordController;
use App\Http\Controllers\Doctor\LabortoryTestResultController;
use App\Http\Controllers\Doctor\MedicationController;
use App\Http\Controllers\Doctor\VitalResultController;
use App\Http\Controllers\PreferenceController;
use App\Models\Blockchain;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});





Route::middleware(['auth', 'user-access:patient'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('appointments', AppointmentController::class);
    Route::resource('preferences', PreferenceController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('branches', BranchController::class);
    Route::resource('doctors', DoctorController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:doctor'])->group(function () {

    Route::get('/doctor/home', [HomeController::class, 'doctorHome'])->name('doctor.home');

    Route::get('/doctor/clinical-note/create', [ClinicalNoteController::class, 'create'])->name('doctor.clinical-note.create');
    Route::post('/doctor/clinical-note/store', [ClinicalNoteController::class, 'store'])->name('doctor.clinical-note.store');
    Route::post('/doctor/clinical-note/{clinical_note_id}/share', [ClinicalNoteController::class, 'share'])->name('doctor.clinical-note.share');
    Route::get('/doctor/clinical-note/{hash}', [ClinicalNoteController::class, 'view'])->name('doctor.clinical-note.view');
    Route::get('/doctor/clinical-note', [ClinicalNoteController::class, 'index'])->name('doctor.clinical-note.index');

    Route::get('/doctor/medication/create', [MedicationController::class, 'create'])->name('doctor.medication.create');
    Route::post('/doctor/medication/store', [MedicationController::class, 'store'])->name('doctor.medication.store');
    Route::get('/doctor/medication', [MedicationController::class, 'index'])->name('doctor.medication.index');

    Route::get('/doctor/labortory-result/create', [LabortoryTestResultController::class, 'create'])->name('doctor.labortory-result.create');
    Route::post('/doctor/labortory-result/store', [LabortoryTestResultController::class, 'store'])->name('doctor.labortory-result.store');
    Route::get('/doctor/labortory-result', [LabortoryTestResultController::class, 'index'])->name('doctor.labortory-result.index');

    Route::get('/doctor/vital-result/create', [VitalResultController::class, 'create'])->name('doctor.vital-result.create');
    Route::post('/doctor/vital-result/store', [VitalResultController::class, 'store'])->name('doctor.vital-result.store');
    Route::get('/doctor/vital-result', [VitalResultController::class, 'index'])->name('doctor.vital-result.index');

    Route::get('/doctor/immunization/create', [ImmunizationRecordController::class, 'create'])->name('doctor.immunization.create');
    Route::post('/doctor/immunization/store', [ImmunizationRecordController::class, 'store'])->name('doctor.immunization.store');
    Route::get('/doctor/immunization', [ImmunizationRecordController::class, 'index'])->name('doctor.immunization.index');
});

/*------------------------------------------
--------------------------------------------
Blockchain Routes
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth'])->group(function () {
    Route::post('/blockchain/add', [BlockchainController::class, 'addBlock']);
    Route::get('/blockchain/{block_hash}', [BlockchainController::class, 'getBlock']);
});

// Generate Genesis Block
if (!\Illuminate\Support\Facades\Storage::exists('blockchain.dat') || \Illuminate\Support\Facades\Storage::size('blockchain.dat') == 0) \App\Http\Controllers\BlockchainController::generateGenesisBlock();
