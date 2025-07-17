<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Public route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authenticated but NOT necessarily verified users
Route::middleware('auth')->group(function () {
    // Breeze profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resend verification or see verification prompt are handled in auth.php (see below)

    // For login route (strangely named)
    Route::get('/login', function () {
        return view('login');
    })->name('login');
});
Route::get('/email/verify', EmailVerificationPromptController::class)
    ->middleware('auth')
    ->name('verification.notice');
// Routes that require both auth AND email verification
Route::middleware(['auth', 'verified'])->group(function () {
    // User page
    Route::get('/userpage', [HomeController::class, 'index'])->name('home.userpage');


    // Product routes
    Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');
    Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
    Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
    Route::post('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');
    Route::get('/cash_order', [HomeController::class, 'cash_order'])->name('cash_order');

    // Admin-only routes (must be admin + verified)
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/categories', [AdminController::class, 'show'])->name('admin.categories');
        Route::post('/categories', [AdminController::class, 'store'])->name('categories.store');
        Route::post('/categories/{id}', [AdminController::class, 'delete_category'])->name('delete_category');

        Route::post('/store_product', [AdminController::class, 'store_product'])->name('admin.store_product');
        Route::get('/view_product', [AdminController::class, 'view_product'])->name('admin.view_product');
        Route::get('/show_product', [AdminController::class, 'show_product'])->name('admin.show_product');
        Route::delete('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('admin.delete_product');
    });
});

// Breeze auth and email verification routes
require __DIR__ . '/auth.php';
