<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestHomeController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', GuestHomeController::class)->name('guest.home');

Route::get('/admin', AdminHomeController::class)->middleware(['auth', 'verified'])->name('admin.home');
Route::get('/admin/projects/create', [ProjectController::class, 'create'])->middleware(['auth', 'verified'])->name('admin.projects.create');
Route::get('/admin/projects/{id}/edit', [ProjectController::class, 'edit'])->middleware(['auth', 'verified'])->name('admin.projects.edit');
Route::put('/admin/projects/{id}', [ProjectController::class, 'update'])->middleware(['auth', 'verified'])->name('admin.projects.update');
Route::post('/admin/projects', [ProjectController::class, 'store'])->middleware(['auth', 'verified'])->name('admin.projects.store');
Route::get('/admin/projects/{id}', [ProjectController::class, 'show'])->name('admin.projects.show');
Route::get('/admin/projects', [ProjectController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.projects.index');
Route::delete('/admin/projects/{id}', [ProjectController::class, 'destroy'])->middleware(['auth', 'verified'])->name('admin.projects.destroy');









require __DIR__ . '/auth.php';

