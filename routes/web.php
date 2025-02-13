<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route Supplier
Route::prefix('supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('supplier');
    Route::post('/', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    Route::get('/download/pdf', [SupplierController::class, 'downloadPDF'])->name('supplier.download.pdf');
    Route::get('/download/excel', [SupplierController::class, 'downloadExcel'])->name('supplier.download.excel');
});

// Route Produk
Route::prefix('produk')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('produk.produk');
    Route::post('/', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::get('/download/pdf', [ProdukController::class, 'downloadPDF'])->name('produk.download.pdf');
    Route::get('/download/excel', [ProdukController::class, 'downloadExcel'])->name('produk.download.excel');
});

// Transaksi
// Perbaiki menjadi:
Route::prefix('transaksi')->group(function () {
    Route::get('/', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/export', [TransaksiController::class, 'export'])->name('transaksi.export'); // Pindah ke atas
    Route::get('/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('/download/pdf', [TransaksiController::class, 'downloadPDF'])->name('transaksi.download.pdf');
    Route::get('/download/excel', [TransaksiController::class, 'downloadExcel'])->name('transaksi.download.excel');
    Route::get('/transaksi/invoice/{id}', [TransaksiController::class, 'downloadInvoice'])->name('transaksi.download-invoice');
});