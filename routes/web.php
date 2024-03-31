<?php

use App\Http\Controllers\BlockchainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DoctorController;

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

new BlockchainController();
BlockchainController::generateGenesisBlock();
