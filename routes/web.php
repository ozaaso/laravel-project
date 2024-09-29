<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::resource('doctor', DoctorController::class);

Route::get('/doctor/search/name/{name}', [DoctorController::class, 'searchByName'])->name('doctor.search.name');


