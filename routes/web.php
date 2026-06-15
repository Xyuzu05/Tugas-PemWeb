<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Custom route untuk search dan filter advanced (harus sebelum resource routes)
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');

// Export buku ke CSV (harus sebelum resource routes)
Route::get('/buku/export', [BukuController::class, 'export'])->name('buku.export');

// Bulk delete buku
Route::post('/buku/bulk-delete', [BukuController::class, 'bulkDelete'])->name('buku.bulk-delete');

// Resource route untuk Buku
Route::resource('buku', BukuController::class);

// Custom route untuk filter kategori
Route::get('/buku/kategori/{kategori}', [BukuController::class, 'filterKategori'])
    ->name('buku.kategori');

// Resource route untuk Anggota
Route::resource('anggota', AnggotaController::class);
