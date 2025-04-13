<?php

namespace App\Models;


class Pendaftar 
{
    // Fungsi "seolah-olah" mengambil dari database
    protected static function getDummyData()
    {
        return [
            ['id' => 1, 'title' => 'Pengambilan nomor antrian'],
            ['id' => 2, 'title' => 'Pengecekan status kk'],
        ];
    }

    // Mengambil semua data
    public static function all($columns = ['*'])
{
    return collect(self::getDummyData());
}


    // Mencari satu data berdasarkan id
    public static function find($id)
    {
        $pendaftars = self::getDummyData();
        foreach ($pendaftars as $pendaftar) {
            if ($pendaftar['id'] == $id) {
                return $pendaftar;
            }
        }
        return null;
    }
}
