<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;
use App\Models\Pendaftar;

Route::get('/pendaftars', [PendaftarController::class, 'index']);
Route::get('/pendaftars/{id}', [PendaftarController::class, 'show']);

// Halaman detail pendaftar dengan formulir
Route::get('/pendaftar/{jenis}', [PendaftarController::class, 'show'])->name('pendaftar.show');

// Proses pengambilan antrian
Route::post('/pengambilan-antrian', [PendaftarController::class, 'simpanAntrian'])->name('antrian.simpan');

// Proses pengecekan status KK
Route::post('/cek-status-kk', [PendaftarController::class, 'cekStatusKK'])->name('kk.cek');

// (Opsional) Daftar semua jenis pendaftar
Route::get('/pendaftars', function () {
    return view('pendaftar\index', [
        'pendaftars' => [
            ['id' => 1, 'title' => 'Pengambilan nomor antrian'],
            ['id' => 2, 'title' => 'Pengecekan status kk'],
        ]
    ]);
    
})->name('pendaftars.index');
