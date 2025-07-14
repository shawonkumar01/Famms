<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    // Profile Routes (required by Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard Routes
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/userpage', function () {
        return view('home.userpage'); // Or your controller logic
    })->name('home.userpage');
    //Admin Routes
    Route::middleware('admin')->prefix('admin')->group(function () {

        Route::get('/dashboard', function () {
            // dd('something');
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/categories', [AdminController::class, 'show'])->name('admin.categories');
        Route::post('/categories', [AdminController::class, 'store'])->name('categories.store');
        Route::post('/categories/{id}', [AdminController::class, 'delete_category'])->name('delete_category');
        Route::get('/view_product', [AdminController::class, 'view_product'])->name('view_product');
        Route::post('/store_product', [AdminController::class, 'store_product'])->name('store_product');

    });
});

require __DIR__ . '/auth.php';