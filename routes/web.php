<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;
use App\Models\Pendaftar;

Route::get('/pendaftars', [PendaftarController::class, 'index']);
Route::get('/pendaftars/{id}', [PendaftarController::class, 'show']);

Route::get('/pendaftars/{id}', function ($id) {
    $pendaftar = Pendaftar::find($id);
    return view('pendaftar.show', compact('pendaftar'));
});

Route::post('/pengambilan-antrian', function (Request $request) {
    $nomor = rand(100, 999);

    return redirect()->back()->with('antrian', [
        'nomor' => $nomor
    ]);
});

Route::post('/cek-status-kk', function (Request $request) {
    $status = rand(0, 1) ? 'Masih diproses' : 'Sudah selesai';

    return redirect()->back()->with('status_kk', [
        $nik = request('nik'),
        'status' => $status
    ]);
});