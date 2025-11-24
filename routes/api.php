<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('produk', ProdukController::class);
Route::apiResource('transaksi', TransaksiController::class)->only(['index', 'show']);

Route::apiResource('nota', NotaController::class);

Route::apiResource('laporan', LaporanController::class);
