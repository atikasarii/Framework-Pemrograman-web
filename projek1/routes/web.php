<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/about', function () {
    return 'Selamat datang di Barokah Marat. Barokah Mart adalah toko yang menyediakan berbagai kebutuhan sehari-hari';
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
    Route::get('/categories', function () {
        return 'Halaman kelola kategori (khusus admin) - CategoryController belum dibuat.';
    })->name('categories.index');

    Route::get('/products', function () {
        return 'Halaman kelola produk (khusus admin) - ProductController belum dibuat.';
    })->name('products.index');

    Route::get('/reports/sales', function () {
        return 'Halaman laporan penjualan (khusus admin) - ReportController belum dibuat.';
    })->name('report.sales');
});

Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', function () {
        return 'Halaman kasir POS (admin & kasir boleh akses) - PosController belum dibuat.';
    })->name('pos.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', function () {
        return 'Halaman kelola akun kasir (khusus admin) - UserController belum dibuat.';
    })->name('users.index');
});

Route::get('/test-badge', function () {
    return view('test-badge');
})->middleware('auth');

Route::get('/test-badge', function () {
    return view('test-badge');
})->middleware('auth');

Route::get('/pos/history', function () {
    return 'Halaman riwayat transaksi kasir - belum dibuat.';
})->middleware(['auth', 'role:admin,kasir'])->name('pos.history');