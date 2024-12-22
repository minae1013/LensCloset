<?php

use App\Http\Controllers\LensController;
use App\Http\Controllers\ProfileController;
use App\Models\Lens;
use Illuminate\Support\Facades\Route;

Route::get('/', [LensController::class, 'home'])->name('home');

Route::get('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::get('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/lens', [LensController::class, 'mylens'])->name('mylens');

    Route::get('/lens/repeat', [LensController::class, 'repeat'])->name('repeat');

    Route::get('lens/create', [LensController::class, 'create'])->name('create');
    Route::post('lens/create', [LensController::class, 'store'])->name('store');

    Route::get('lens/{id}', [LensController::class, 'show'])->name('show');

    Route::get('lens/{id}/edit', [LensController::class, 'edit'])->name('edit');
    Route::put('lens/{id}', [LensController::class, 'update'])->name('update');

    Route::delete('lens/{id}', [LensController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
