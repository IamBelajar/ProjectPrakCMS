<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatekkTable extends Migration
{
   public function up()
    {
    if (!Schema::hasTable('kk')) {
        Schema::create('kk', function (Blueprint $table) {
            $table->bigInteger('id_pendaftar');
            $table->string('nik');
            $table->string('no_kk');
            $table->string('nama_kk');
            $table->string('alamat');
            $table->date('tanggal_cetak');
            $table->timestamps();
        });
    }

        
    }

    public function down()
    {
        Schema::dropIfExists('kk');
    }
}