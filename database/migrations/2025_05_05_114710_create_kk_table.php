<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendaftar_id');
            $table->string('nik');
            $table->string('no_kk')->unique();
            $table->string('nama_kepala_keluarga');
            $table->string('alamat');
            $table->date('tanggal_cetak');
            $table->timestamps();
        
            $table->foreign('pendaftar_id')->references('id')->on('pendaftars')->onDelete('cascade');
        });     

        $this->callSeeder();
    }

    private function callSeeder(): void
    {
        // Jalankan seeder secara manual
        (new kkSeeder)->run();
    }  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kk');
    }
};
