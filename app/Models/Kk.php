<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;

    // Jika nama tabel bukan jamak dari nama model, sebutkan secara eksplisit
    protected $table = 'kk';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'pendaftar_id',
        'nik',
        'no_kk',
        'nama_kepala_keluarga',
        'alamat',
        'tanggal_cetak',
    ];

    // Relasi ke model Pendaftar
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
