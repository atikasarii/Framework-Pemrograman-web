<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/about', function () {
    return 'Selamat datang di Barokah Mart. Barokah Mart adalah toko yang menyediakan berbagai kebutuhan sehari-hari';
});

Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

    Route::get('/reports/sales', function () {
        return 'Halaman laporan penjualan (khusus admin) - ReportController belum dibuat.';
    })->name('report.sales');

    Route::get('/users', function () {
        return 'Halaman kelola akun kasir (khusus admin) - UserController belum dibuat.';
    })->name('users.index');
});

Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', function () {
        return 'Halaman kasir POS (admin & kasir boleh akses) - PosController belum dibuat.';
    })->name('pos.index');

    Route::get('/pos/history', function () {
        return 'Halaman riwayat transaksi kasir - belum dibuat.';
    })->name('pos.history');
});

Route::get('/test-badge', function () {
    return view('test-badge');
})->middleware('auth');
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [\App\Http\Controllers\PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [\App\Http\Controllers\PosController::class, 'store'])->name('pos.store');
    Route::get('/pos/{transaction}/struk', [\App\Http\Controllers\PosController::class, 'struk'])->name('pos.struk');
});
