<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pages/menuCatering', function () {
    return view('pages.menuCatering');
})->name('menuCatering');

Route::get('/pages/testimoni', function () {
    return view('pages.testimoni');
})->name('Testimoni');

Route::get('/pages/subscription', function () {
    return view('pages.subscription');
})->name('subscribe');

Route::get('/pages/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
