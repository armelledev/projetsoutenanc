<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PresenceController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard employé (enseignant)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Espace admin
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    Route::middleware(['auth', 'RestrictByRole:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', AdminUserController::class)->except(['show']);
    });

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

});
Route::get('/admin/Users.edit', [AdminUserController::class, 'edit'])->name('admin.Users.edit');

Route::get('/admin/user.create', [AdminUserController::class, 'create'])->name('admin.Users.create');

Route::put('admin/presences', [PresenceController::class, 'store'])->name('admin.presences.store');
Route::get('admin/presences/create', [PresenceController::class, 'create'])->name('admin.presences.create');
Route::put('/presences/{presence}/depart', [PresenceController::class, 'depart'])->name('admin.presences.depart');
Route::get('admin/presences/index', [PresenceController::class, 'index'])->name('admin.presences.index');
Route::get('admin/presences/{presence}/edit', [PresenceController::class, 'edit'])->name('admin.presences.edit');
Route::put('/presences/{presence}', [PresenceController::class, 'update'])->name('admin.presences.update');
Route::delete('/presences/delete/{presence}', [PresenceController::class, 'destroy'])->name('admin.presences.delete');
Route::post('/presence/{presence}/justifier', [DashboardController::class, 'storeJustification'])
        ->name('employe.justification.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
