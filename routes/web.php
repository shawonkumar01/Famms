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
    Route::get('/lohin', function () {
        return view('login');
    })->name('login');
    // Add this instead of the removed route
    Route::get('/userpage', [HomeController::class, 'index'])->name('home.userpage');

    //Admin Routes
    Route::middleware('admin')->prefix('admin')->group(function () {

        Route::get('/dashboard', function () {
            // dd('something');
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/categories', [AdminController::class, 'show'])
            ->name('admin.categories');

        Route::post('/categories', [AdminController::class, 'store'])
            ->name('categories.store');

        Route::post('/categories/{id}', [AdminController::class, 'delete_category'])
            ->name('delete_category');

        Route::post('/store_product', [AdminController::class, 'store_product'])
            ->name('admin.store_product');
        Route::get('/view_product', [AdminController::class, 'view_product'])
            ->name('admin.view_product');
        Route::get('/show_product', [AdminController::class, 'show_product'])
            ->name('admin.show_product');
        Route::delete('/delete_product/{id}', [AdminController::class, 'delete_product'])
            ->name('admin.delete_product');
    });
    Route::get('/product_details/{id}', [HomeController::class, 'product_details'])
        ->name('product_details');
    Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])
        ->name('add_cart');
    Route::get('/show_cart', [HomeController::class, 'show_cart'])
        ->name('show_cart');
});

require __DIR__ . '/auth.php';