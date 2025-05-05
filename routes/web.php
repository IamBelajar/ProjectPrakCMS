<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;

Route::get('/', [PendaftarController::class, 'index']);
Route::post('/pendaftar', [PendaftarController::class, 'store'])->name('pendaftar.store');
Route::get('/show', [PendaftarController::class, 'show'])->name('pendaftar.show'); // Rute show tanpa ID
Route::post('/cetak-kk', [PendaftarController::class, 'cetakKK'])->name('pendaftar.cetak');
// web.php
Route::get('/pendaftar/form', function () {
    return view('pendaftar.show');
})->name('pendaftar.form');
Route::get('/pendaftar/cetak', function () {
    return view('pendaftar.show');
})->name('pendaftar.cetak');
Route::get('/', function () {
    return view('pendaftar.index');
})->name('pendaftar.index');
