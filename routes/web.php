<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');
Route::redirect('/', '/dashboard');

// Route::view('dashboard', 'dashboard')
// ->middleware(['auth', 'verified'])
// ->name('dashboard');

Route::get('dashboard', [DashboardController::class, "index"])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Ruta option 1
Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Ruta option 2
// Route::prefix('categories')->group(function () {
//     Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
//     Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
//     Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
//     Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show');
//     Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
//     Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
//     Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// });

// Ruta opcion 3
// Route::resource('categories', CategoryController::class);


require __DIR__.'/auth.php';
