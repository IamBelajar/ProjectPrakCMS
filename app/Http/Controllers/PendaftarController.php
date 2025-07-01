<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\KK;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Log;

class PendaftarController extends Controller
{
    public function formPendaftaran()
    {
        return view('pendaftar.show');
    }

    public function submitPendaftaran(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required|unique:pendaftar,nik|numeric',
                'alamat' => 'required',
                'telepon' => 'required|numeric',
            ]);

            $pendaftar = new Pendaftar();
            $pendaftar->nama = $request->nama;
            $pendaftar->nik = $request->nik;
            $pendaftar->alamat = $request->alamat;
            $pendaftar->telepon = $request->telepon;
            $pendaftar->save();

            // Tambahkan log info
            Log::info('Pendaftaran berhasil disimpan', [
                'id' => $pendaftar->id,
                'nama' => $pendaftar->nama,
                'nik' => $pendaftar->nik,
            ]);

            return redirect()->route('pendaftar.form')
                             ->with('success_pendaftaran', 'Pendaftaran berhasil!')
                             ->with('pendaftar', $pendaftar);
        } catch (\Exception $e) {
            // Tambahkan log error
            Log::error('Gagal menyimpan pendaftaran: ' . $e->getMessage());

            return back()->withErrors('Terjadi kesalahan saat menyimpan data.');
        }
    }

     public function formKk() {
    session(['type' => 'kk']); 
    return view('pendaftar.show'); 
}


    public function formCekPendaftar()
    {
        session(['type' => 'cek']);
        return view('pendaftar.cek');
    }

    public function cekPendaftar(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]);

        try {
            $data = Pendaftar::findOrFail($request->id);
            return view('pendaftar.cek', compact('data'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('form.cek.pendaftar')->withErrors('Pendaftar tidak ditemukan.');
        }
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