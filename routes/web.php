<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\ImageController;

Route::get('/pendaftar/form', function () {
    return view('pendaftar.show');
})->name('pendaftar.form');
Route::get('/pendaftar/cetak', function () {
    return view('pendaftar.show');
})->name('pendaftar.cetak');
Route::get('/', function () {
    return view('pendaftar.index');
})->name('pendaftar.index');


Route::get('/pendaftaran', [PendaftarController::class, 'formPendaftaran'])->name('form.pendaftaran');
Route::post('/pendaftaran/submit', [PendaftarController::class, 'submitPendaftaran'])->name('pendaftaran.submit');

Route::get('/kk', [PendaftarController::class, 'formKk'])->name('kk.show');
Route::post('/kk/submit', [PendaftarController::class, 'submitKk'])->name('kk.submit');

Route::get('/pendaftar/{id}', [PendaftarController::class, 'showPendaftar'])->name('pendaftar.show');
Route::delete('/pendaftar/{id}', [PendaftarController::class, 'destroy'])->name('pendaftar.destroy');

Route::get('/kk/{id}', [PendaftarController::class, 'showKk'])->name('kk.show');
Route::delete('/kk/{id}', [PendaftarController::class, 'destroy'])->name('kk.destroy');

Route::get('/pendaftaran', [PendaftarController::class, 'formPendaftaran'])->name('pendaftar.form');
Route::post('/pendaftaran', [PendaftarController::class, 'submitPendaftaran'])->name('pendaftaran.submit');

Route::get('/kk', [PendaftarController::class, 'showForm'])->name('kk.form');
Route::post('/kk/submit', [PendaftarController::class, 'submitKk'])->name('kk.submit');

Route::get('/pendaftaran-kk', function () {
    return 'Selamat datang di halaman Pendaftaran KK Online!';
})->middleware('check.age');

Route::get('/upload', [ImageController::class, 'create'])->name('pendaftar.upload');
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.destroy');

Route::get('/cek-pendaftar', [PendaftarController::class, 'formCekPendaftar'])->name('form.cek.pendaftar');
Route::get('/cek-pendaftar/search', [PendaftarController::class, 'cekPendaftar'])->name('pendaftar.cek');