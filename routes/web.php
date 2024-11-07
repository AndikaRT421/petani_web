<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('public.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get(('/belanja'), function () {
    return view('public.shopping');
})->name('belanja');

Route::get(('/panen'), function () {
    return view('public.crop_prediction');
})->name('panen');

require __DIR__.'/auth.php';
require __DIR__.'/mitra-auth.php';
