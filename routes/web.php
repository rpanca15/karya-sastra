<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PoemController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PoemController::class, 'myPoems'])->name('poems.my');
    Route::get('/poems/create', [PoemController::class, 'create'])->name('poems.create');
    Route::post('/poems', [PoemController::class, 'store'])->name('poems.store');
    Route::get('/poems/{poem}/edit', [PoemController::class, 'edit'])->name('poems.edit');
    Route::put('/poems/{poem}', [PoemController::class, 'update'])->name('poems.update');
    Route::delete('/poems/{poem}', [PoemController::class, 'destroy'])->name('poems.destroy');
});

// Public
Route::get('/', [PoemController::class, 'index'])->name('poems.index');
Route::get('/poems/{poem}', [PoemController::class, 'show'])->name('poems.show');
