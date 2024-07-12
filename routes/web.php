<?php

declare(strict_types=1);

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('programs', ProgramController::class);

    Route::resource('admins', AdminController::class);

    Route::resource('students', StudentController::class);

    Route::resource('registrations', RegistrationController::class);
});

Auth::routes();
