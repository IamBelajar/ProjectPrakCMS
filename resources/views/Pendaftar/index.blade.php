@extends('layouts.app')

@section('title', 'Layanan Pendaftaran KK')

@section('content')
<style>
    .hero-section {
        background: linear-gradient(to right, #6dd5ed, #2193b0);
        color: white;
        padding: 60px 20px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .action-buttons a {
        margin: 10px;
        min-width: 200px;
        transition: transform 0.2s ease;
    }

    .action-buttons a:hover {
        transform: scale(1.05);
    }

    .btn-start {
        background: linear-gradient(to right, #56ab2f, #a8e063);
        border: none;
        color: white;
    }

    .btn-result {
        background: linear-gradient(to right, #ff416c, #ff4b2b);
        border: none;
        color: white;
    }
</style>

<div class="container mt-5">
    <div class="hero-section text-center">
        <h1 class="display-5 fw-bold">Selamat Datang di Layanan Pendaftaran KK</h1>
        <p class="lead">Silakan lakukan pendaftaran untuk mendapatkan Nomor Antrian dan mencetak Kartu Keluarga.</p>
    </div>

    <div class="text-center action-buttons mt-5">
    <a href="{{ route('pendaftar.form') }}" class="btn btn-success btn-lg">📝 Mulai Pendaftaran</a>
    <a href="{{ route('pendaftar.cetak') }}" class="btn btn-warning btn-lg">📄 Hasil Cetak</a>
    <a href="{{ route('image.upload') }}" class="btn btn-warning btn-lg">📄 Upload foto</a>
    
</div>

</div>
@endsection
