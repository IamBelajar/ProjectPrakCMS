<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KK;
use App\Models\Pendaftar;

class PendaftarController extends Controller
{
    public function formPendaftaran()
{
    return view('pendaftar.show'); // view ini berisi form yang kamu lampirkan di atas
}


    public function submitPendaftaran(Request $request)
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

    return redirect()->route('pendaftar.form')
                     ->with('success_pendaftaran', 'Pendaftaran berhasil!')
                     ->with('pendaftar', $pendaftar);
}

     public function formKk() {
        session(['type' => 'kk']);
        return view('kk.show');
    }

    public function submitKk(Request $request) {
        $validated = $request->validate([
            'id_pendaftar' => 'required|integer',
            'nik' => 'required|integer',
            'no_kk' => 'required|integer',
            'nama_kk' => 'required',
            'alamat' => 'required',
            'tanggal_cetak' => 'required',
        ]);

        $kk = Kk::create($validated);
        session(['kk'=>$kk,'type' => 'kk']);

        
        return redirect()->route('pendaftar.cetak')
                     ->with('success_kk', 'KK Siap Cetak!')
                     ->with('kk', $kk);
    }


    public function destroy($id)
{
    // Hapus data Pendaftar
    $pendaftar = Pendaftar::findOrFail($id);
    $pendaftar->delete();

    session()->forget('pendaftar');

    // Hapus data KK yang terkait jika ada
    $kk = KK::where('id_pendaftar', $id)->first();
    if ($kk) {
        $kk->delete();
        session()->forget('kk');
    }

    return redirect()->route('pendaftar.form')->with('success', 'Data pendaftar dan KK berhasil dihapus');
}

}