<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Langganan\SubscriptionController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Langganan\SubscriptionDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementControll;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pages/menuCatering', function () {
    return view('pages.menuCatering');
})->name('menuCatering');

Route::get('/pages/testimoni', function () {
    return view('pages.testimoni');
})->name('Testimoni');


Route::get('/pages/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

// Make sure the controller class matches the import above.
Route::get('/pelanggan/dashboard',[SubscriptionDashboardController::class,'index'])->name('pelanggan.dashboard')->middleware('role:pelanggan');


Route::get('/admin/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware(['auth', 'role:admin']);
Route::get('/pelanggan/dashboard',[SubscriptionDashboardController::class,'index'])->name('pelanggan.dashboard')->middleware(['auth', 'role:pelanggan']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/subscription/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
    Route::post('/subscription/store', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    Route::get('/subscription/success', [SubscriptionController::class, 'success'])->name('subscriptions.success');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [UserManagementControll::class, 'index'])->name('user.index');
    Route::patch('/user/{user}/toggle', [UserManagementControll::class, 'toggleStatus'])->name('user.toggle');
});

Route::get('/admin-only', function () {
    return 'Hanya admin yang boleh lihat ini';
})->middleware(['auth', 'role:admin']);

require __DIR__.'/auth.php';
