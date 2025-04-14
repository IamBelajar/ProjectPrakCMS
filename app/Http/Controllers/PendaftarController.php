<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class PendaftarController extends Controller
{
public function index()

    {
        $pendaftars = Pendaftar::all();
        return view('pendaftar\index', compact('pendaftars'));
    }

    public function show($id)
    {
        $pendaftar = pendaftar::find($id);
        if (!$pendaftar) {
            abort(404);
        }
        return view('pendaftar\show', compact('pendaftar'));
    }
    // Untuk Antrian
public function simpanAntrian(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nik' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
    ]);

    $nomorAntrian = rand(100, 999);

    return view('pendaftar\hasil', [
        'pendaftar' => ['title' => 'Pengambilan nomor antrian'],
        'nama' => $request->nama,
        'nomor_antrian' => $nomorAntrian,
    ]);
}

// Untuk Status KK
public function cekStatusKK(Request $request)
{
    $request->validate([
        'nik' => 'required',
    ]);

    $status = rand(0, 1) ? 'proses' : 'selesai';

    return view('pendaftar\hasil', [
        'pendaftar' => ['title' => 'Pengecekan status kk'],
        'nik' => $request->nik,
        'status' => $status,
    ]);
}

}
