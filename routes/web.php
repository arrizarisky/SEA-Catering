<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Langganan\SubscriptionController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Langganan\SubscriptionDashboardController;
use App\Http\Controllers\Langganan\SubscriptionCancelController;
use App\Http\Controllers\Langganan\SubscriptionPauseController;
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

Route::get('/admin/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware(['auth', 'role:admin']);
Route::get('/subscription/dashboard',[SubscriptionDashboardController::class,'index'])->name('subscription.dashboard')->middleware(['auth', 'role:pelanggan']);


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

Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/subscription/dashboard', [\App\Http\Controllers\Langganan\SubscriptionDashboardController::class, 'subscriptionDashboard'])->name('subscription.dashboard');
    Route::post('/subscription/pause', [\App\Http\Controllers\Langganan\SubscriptionDashboardController::class, 'pause'])->name('subscription.pause');
    Route::post('/subscription/cancel', [\App\Http\Controllers\Langganan\SubscriptionDashboardController::class, 'cancel'])->name('subscription.cancel');
});

Route::patch('/admin/subscription/{id}/activate', [\App\Http\Controllers\Admin\AdminSubscriptionController::class, 'activate'])->name('admin.subscription.activate');

require __DIR__.'/auth.php';
