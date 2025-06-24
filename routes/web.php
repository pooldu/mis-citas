<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DoctorController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Specialty
Route::get('/specialties', [SpecialtyController::class, 'index']);
Route::get('/specialties/create', [SpecialtyController::class, 'create']);//form del registro
Route::get('/specialties/{specialty}/edit', [SpecialtyController::class, 'edit']);

Route::post('/specialties', [SpecialtyController::class, 'store']);//envio del form
Route::put('/specialties/{specialty}', [SpecialtyController::class, 'update']);
Route::delete('/specialties/{specialty}', [SpecialtyController::class, 'destroy']);

//Doctors
Route::resource('doctors', DoctorController::class);

//Patients
