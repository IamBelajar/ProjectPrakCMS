<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    protected $table = 'KK';

    // Jika tidak ada kolom ID sebagai primary key, tentukan primary key lain
    protected $primaryKey = 'id_kk';  // ganti sesuai nama kolom primary key di tabel KK

    public $incrementing = false; // jika primary key bukan auto-increment

    protected $keyType = 'string'; // jika primary key bertipe string, sesuaikan

    protected $fillable = [
        'id_pendaftar', 'nik', 'no_kk', 'nama_kk', 'alamat', 'tanggal_cetak'
    ];
}
