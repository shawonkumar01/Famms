<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// 🏠 Home page for guest

Route::get('/', [HomeController::class, 'index'])->name('home.userpage');


// ✅ Authenticated but not necessarily verified
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 📧 Email verification prompt
    Route::get('/email/verify', EmailVerificationPromptController::class)
        ->name('verification.notice');
});

// ✅ Routes for verified users
Route::middleware(['auth', 'verified'])->group(function () {

    // 👤 User Dashboard (after login for usertype != admin)
    Route::get('/userpage', [HomeController::class, 'index'])->name('home.userpage');

    // 🛒 Product Routes
    Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');
    Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
    Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
    Route::post('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');
    Route::get('/cash_order', [HomeController::class, 'cash_order'])->name('cash_order');
    Route::get('/product_search', [HomeController::class, 'product_search'])->name('product_search');
    Route::get('/show_order', [HomeController::class, 'show_order'])->name('show_order');

    // 🛡️ Admin-only routes
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
        Route::get('/order', [AdminController::class, 'order'])->name('admin.order');
        Route::get('/delivery/{id}', [AdminController::class, 'delivery'])->name('admin.delivery');
        Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf'])->name('admin.print_pdf');
        Route::get('/send_email/{id}', [AdminController::class, 'send_email'])->name('admin.send_email');
        Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email'])->name('admin.send_user_email');
        Route::get('/admin/order/search', [AdminController::class, 'search_data'])->name('admin.order_search');
    });
});

// 🧠 Breeze Authentication routes (login, register, etc.)
require __DIR__ . '/auth.php';
