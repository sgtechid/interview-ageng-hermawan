<?php

use App\Http\Controllers\ConvertCurrencyController;
use App\Http\Controllers\CronJobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user-management', [UserController::class, 'index'])->name('user.management.index');
    Route::get('/user-management/create', [UserController::class, 'create'])->name('user.management.create');
    Route::post('/user-management/store', [UserController::class, 'store'])->name('user.management.store');
    Route::get('/user-management/edit/{id}', [UserController::class, 'edit'])->name('user.management.edit');
    Route::delete('/user-management/delete/{id}', [UserController::class, 'delete'])->name('user.management.delete');
    Route::put('/user-management/update/{id}', [UserController::class, 'update'])->name('user.management.update');

    Route::get('/cron-job', [CronJobController::class, 'index'])->name('cron-job.index');
    Route::post('/cron-job/create', [CronJobController::class, 'create'])->name('cron-job.create');
    Route::post('/cron-job/destroy', [CronJobController::class, 'destroy'])->name('cron-job.destroy');

    Route::get('/convert-currency', [ConvertCurrencyController::class, 'index'])->name('convert.currency.index');
});

require __DIR__ . '/auth.php';
