<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['pengguna.auth'])->group(function () {
    // Debug session route
    Route::get('/debug/session', function () {
        return response()->json([
            'session_data' => [
                'pengguna_id' => session('pengguna_id'),
                'pengguna_username' => session('pengguna_username'),
                'pengguna_email' => session('pengguna_email'),
                'pengguna_roles' => session('pengguna_roles'),
            ],
            'session_all' => session()->all(),
            'auth_check' => session()->has('pengguna_id'),
        ]);
    })->name('debug.session');
});


// Protected Routes
Route::middleware(['pengguna.auth'])->group(function () {
    // POS (Kasir)
    
    
    // POS (Kasir & Admin)
    Route::middleware(['pengguna.role:kasir, admin'])->group(function () {
        Route::get('/', [PosController::class, 'index'])->name('pos.index');
        Route::get('/pos/products', [PosController::class, 'getProducts'])->name('pos.products');
        Route::get('/api/transaksi', [TransaksiController::class, 'webIndex'])->name('pos.transaksi.index');
        Route::get('/nota/{kode_nota}', [NotaController::class, 'show'])->name('pos.nota.show');   


        // POS API endpoints using web session
        Route::post('/api/pemesanan', [PemesananController::class, 'store'])->name('pos.pemesanan.store');
        Route::post('/api/pembayaran', [PembayaranController::class, 'store'])->name('pos.pembayaran.store');
    });
    

    // Product Management (Admin Only)
    Route::middleware(['pengguna.role:admin'])->prefix('produk')->name('products.')->group(function () {
        Route::get('/', [ProdukController::class, 'webIndex'])->name('index');
        Route::get('/create', [ProdukController::class, 'create'])->name('create');
        Route::post('/', [ProdukController::class, 'webStore'])->name('store');
        Route::get('/{produk}/edit', [ProdukController::class, 'edit'])->name('edit');
        Route::put('/{produk}', [ProdukController::class, 'webUpdate'])->name('update');
        Route::delete('/{produk}', [ProdukController::class, 'webDestroy'])->name('destroy');
    });

    // Transactions (Admin & Kasir)
    Route::middleware(['pengguna.role:kasir,admin'])->group(function () {
        Route::get('/transactions', [TransaksiController::class, 'webIndex'])->name('transaksi.index');
    });

    // Reports (Admin Only)
    Route::middleware(['pengguna.role:admin'])->group(function () {
        Route::get('/reports', [LaporanController::class, 'webIndex'])->name('reports.index');
    });

});
