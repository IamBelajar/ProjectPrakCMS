@extends('layouts.app')

@section('title', 'Formulir Pendaftaran KK')

@section('content')
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Formulir Pendaftaran KK</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('pendaftar.show') }}">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Daftar Sekarang</button>
                    <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary ms-2">Kembali ke Beranda</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('title', 'Formulir Cetak KK')

@section('content')
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Formulir Cetak Kartu Keluarga</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('pendaftar.show') }}">
                @csrf

                <div class="mb-3">
                    <label for="id_pendaftar" class="form-label">ID Pendaftar</label>
                    <input type="text" name="id" id="id_pendaftar" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning">Cetak Kartu Keluarga</button>
                    <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary ms-2">Kembali ke Beranda</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection