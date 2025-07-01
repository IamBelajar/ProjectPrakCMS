<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;

// Autentikasi
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group routes yang membutuhkan login
Route::middleware('auth')->group(function () {

    Route::get('/index', function () {
        return view('pendaftar.index');
    })->name('pendaftar.index');

    // FORM PENDAFTARAN
    Route::get('/pendaftaran', [PendaftarController::class, 'formPendaftaran'])->name('pendaftar.form');
    Route::post('/pendaftaran', [PendaftarController::class, 'submitPendaftaran'])->name('pendaftaran.submit');

    // FORM CETAK KK
    Route::get('/kk', [PendaftarController::class, 'formKk'])->middleware('auth')->name('pendaftar.cetak');
    Route::post('/kk/submit', [PendaftarController::class, 'submitKk'])->name('kk.submit');

    // CEK PENDAFTAR
    Route::get('/cek-pendaftar', [PendaftarController::class, 'formCekPendaftar'])->name('form.cek.pendaftar');
    Route::get('/cek-pendaftar/search', [PendaftarController::class, 'cekPendaftar'])->name('pendaftar.cek');

    // HAPUS PENDAFTAR DAN KK
    Route::delete('/pendaftar/{id}', [PendaftarController::class, 'destroy'])->name('pendaftar.destroy');

    // UPLOAD GAMBAR
    Route::get('/upload', [ImageController::class, 'create'])->name('pendaftar.upload');
    Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
    Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.destroy');

});
