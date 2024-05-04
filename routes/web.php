<?php

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
});

require __DIR__ . '/auth.php';
