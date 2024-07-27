<?php

declare(strict_types=1);

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\HomeController as AdminHomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPageController::class);

Route::middleware('auth')->group(function () {
    Route::middleware('admin-only')->group(function () {
        Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('home');

        Route::resource('programs', ProgramController::class);

        Route::resource('branches', BranchController::class);

        Route::resource('admins', AdminController::class);

        Route::resource('students', StudentController::class);

        Route::resource('registrations', RegistrationController::class);
        Route::get('registrations/report/create', [RegistrationController::class, 'createReport'])
            ->name('registrations.create-report');
        Route::post('registrations/report/generate', [RegistrationController::class, 'generateReport'])
            ->name('registrations.generate-report');

        Route::resource('payments', PaymentController::class)->except(['index', 'create', 'edit']);
    });

    Route::prefix('student')->middleware('student-only')->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('student.home');

        Route::view('/complete-registration', 'student.complete-registration')
            ->name('student.complete-registration');

        Route::post('/complete-registration', [HomeController::class, 'completeRegistration'])
            ->name('student.store-registration');

        Route::post('/recreate-payment-link', [HomeController::class, 'recreatePaymentLink'])
            ->name('student.recreate-payment-link');
    });
});

Auth::routes();
