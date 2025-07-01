<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Langganan\SubscriptionController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Langganan\SubscriptionDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementControll;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\KontakController;
use App\Models\Menu;

Route::get('/', function () {
    return view('welcome');
})->name('Beranda');

Route::get('/pages/menuCatering', function () {
    $menus = Menu::with('category')->get();
    return view('pages.menuCatering', compact('menus'));
})->name('menuCatering');

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
    Route::get('/subscription/payment', [SubscriptionController::class, 'payment'])->name('subscriptions.payment');
    Route::post('/subscription/calculate', [SubscriptionController::class, 'calculate'])->name('subscriptions.calculate');
    Route::post('/subscription/confirm', [SubscriptionController::class, 'confirm'])->name('subscriptions.confirm');
    Route::post('/subscription/store', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    Route::get('/subscription/success', [SubscriptionController::class, 'success'])->name('subscriptions.success');
    Route::post('/subscription/quick-buy', [SubscriptionController::class, 'quickBuy'])->name('subscriptions.quick-buy');
    Route::get('/subscription/quick-form/{plan}', [SubscriptionController::class, 'quickForm'])->name('subscriptions.quick-form');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [UserManagementControll::class, 'index'])->name('user.index');
    Route::patch('/user/{user}/toggle', [UserManagementControll::class, 'toggleStatus'])->name('user.toggle');
});

Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/subscription/account', [\App\Http\Controllers\Langganan\SubscriptionDashboardController::class, 'subscriptionDashboard'])->name('subscription.account');
    Route::get('/subscription/dashboard', [\App\Http\Controllers\Langganan\SubscriptionDashboardController::class, 'index'])->name('subscription.dashboard');
    Route::post('/subscription/pause', [\App\Http\Controllers\Langganan\SubscriptionDashboardController::class, 'pause'])->name('subscription.pause');
    Route::post('/subscription/cancel', [\App\Http\Controllers\Langganan\SubscriptionDashboardController::class, 'cancel'])->name('subscription.cancel');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/plan/{plan}/testimoni', [TestimoniController::class, 'create'])->name('testimoni.create');
    Route::post('/plan/{plan}/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
});
Route::get('/testimoni/index', [TestimoniController::class, 'index'])->name('testimoni.index');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
    Route::delete('/menus/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
    Route::get('/menus/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::put('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');
    Route::get('/menus/index', [MenuController::class, 'index'])->name('menus.index');
});
Route::get('/pages/menuCatering', [MenuController::class, 'publicIndex'])->name('menuCatering');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


Route::patch('/admin/subscription/{id}/activate', [\App\Http\Controllers\Admin\AdminSubscriptionController::class, 'activate'])->name('admin.subscription.activate');

require __DIR__.'/auth.php';
