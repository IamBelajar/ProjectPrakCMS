<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar'; // sesuai nama tabel

    protected $fillable = [
            'nama',
            'nik',
            'alamat',
            'telepon',
    ];

    // Relasi: Pendaftar memiliki banyak Obat
    public function kk()
    {
        return $this->hasMany(Kk::class, 'id_pendaftar');
    }
}
