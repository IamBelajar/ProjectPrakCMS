<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarTable extends Migration
{
    public function up()
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('alamat');
            $table->string('telepon');
            $table->timestamps();
        });        
    }

    private function callSeeder(): void
    {
        // Jalankan seeder secara manual
        (new PendaftarSeeder)->run();
    }

    public function down()
    {
        Schema::dropIfExists('pendaftar');
    }
}