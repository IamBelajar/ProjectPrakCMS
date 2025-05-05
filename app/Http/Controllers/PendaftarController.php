<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index(Request $request)
{
    $pendaftar = $request->session()->get('pendaftar', null);
    return view('pendaftar.index', compact('pendaftar'));
}


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:pendaftar,nik',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $pendaftar = new Pendaftar();
        $pendaftar->nama = $request->nama;
        $pendaftar->nik = $request->nik;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->telepon = $request->telepon;
        $pendaftar->save();

        $pendaftar->no_antrian = $pendaftar->id;  // Assuming ID is the queue number
        $pendaftar->save();

        return view('show', ['pendaftar' => $pendaftar]);
    }

    public function show()
    {
        // Cek apakah ada pendaftar yang sudah terdaftar di session atau melalui request
        $pendaftar = session('pendaftar'); // Bisa gunakan session untuk menyimpan data sementara
        $nomorAntrian = rand(1000, 9999); // Nomor antrian acak

        return view('pendaftar.show', compact('pendaftar', 'nomorAntrian'));
    }

    public function cetakKK(Request $request)
    {
        $pendaftar = Pendaftar::find($request->id);
        // Logic for generating the KK printout can be added here
        return view('hasil', ['pendaftar' => $pendaftar]);
    }
    public function form()
{
    return view('pendaftar.form');
}

public function cetak()
{
    return view('pendaftar.cetak');
}

}
