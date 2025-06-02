@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Form Pendaftaran --}}
    @if(Route::currentRouteName() == 'pendaftar.form')
        <div class="card mb-5">
            <div class="card-header bg-primary text-white">
                <h4>Form Pendaftaran</h4>
            </div>
            <div class="card-body">

                @if(session('success_pendaftaran'))
                    <div class="alert alert-success">{{ session('success_pendaftaran') }}</div>
                @endif

                <form action="{{ route('pendaftaran.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>NIK:</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat:</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon:</label>
                        <input type="text" name="telepon" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Daftar</button>
                </form>

                @if(session('pendaftar'))
                    <hr>
                    <h5>Detail Pendaftar Baru</h5>
                    <table class="table table-bordered mt-3">
                        <tr><th>ID</th><td>{{ session('pendaftar')->id }}</td></tr>
                        <tr><th>Nama</th><td>{{ session('pendaftar')->nama }}</td></tr>
                        <tr><th>NIK</th><td>{{ session('pendaftar')->nik }}</td></tr>
                        <tr><th>Alamat</th><td>{{ session('pendaftar')->alamat }}</td></tr>
                        <tr><th>Telepon</th><td>{{ session('pendaftar')->telepon }}</td></tr>
                    </table>

                    <form action="{{ route('pendaftar.destroy', session('pendaftar')->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button href="{{ route('pendaftar.form') }}" type="submit" class="btn btn-danger">Hapus Data</button>
                    </form>
                @endif
            </div>
        </div>
    @endif

    {{-- Form Cetak KK --}}
    @if(Route::currentRouteName() == 'pendaftar.cetak')
        <div class="card mb-5">
            <div class="card-header bg-success text-white">
                <h4>Form Cetak KK</h4>
            </div>
            <div class="card-body">

                @if(session('success_kk'))
                    <div class="alert alert-success">{{ session('success_kk') }}</div>
                @endif

                <form action="{{ route('kk.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>ID Pendaftar:</label>
                        <input type="number" name="id_pendaftar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>NIK:</label>
                        <input type="number" name="nik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No KK:</label>
                        <input type="number" name="no_kk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama KK:</label>
                        <input type="text" name="nama_kk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat:</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Cetak:</label>
                        <input type="date" name="tanggal_cetak" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Cetak Kartu</button>
                </form>

               @if(session('kk'))
    <hr>
    <h4 class="mb-3">🧾 Data Kartu Keluarga</h4>
    <div class="row">
        <!-- Informasi KK -->
        <div class="col-md-7">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Informasi KK</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr><th>ID Pendaftar</th><td>{{ session('kk')->id_pendaftar }}</td></tr>
                        <tr><th>NIK</th><td>{{ session('kk')->nik }}</td></tr>
                        <tr><th>No KK</th><td>{{ session('kk')->no_kk }}</td></tr>
                        <tr><th>Nama KK</th><td>{{ session('kk')->nama_kk }}</td></tr>
                        <tr><th>Alamat</th><td>{{ session('kk')->alamat }}</td></tr>
                        <tr><th>Tanggal Cetak</th><td>{{ session('kk')->tanggal_cetak }}</td></tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Ilustrasi Gambar KK -->
        <div class="col-md-5 text-center">
            <img src="https://lh6.googleusercontent.com/proxy/RLJbRNliZg8-7mGW0nqTsQbi3k6iY5EHPhfiTyqUJmqYJtHnxK6NJmXJEWme4Pym69gUfhDk-ThRsQiJYCcGQhpPjvDo" alt="Contoh KK" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
            <small class="text-muted d-block mt-2">* Tampilan Kartu Keluarga</small>

            <!-- Tombol Cetak dan Hapus -->
                    <div class="d-flex justify-content-between mt-3" >
                        <form action="#" onsubmit="alert('Simulasi Cetak KK.'); return false;">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-printer-fill"></i> Cetak KK
                            </button>
                        </form>


                    </div>
        </div>
    </div>
@endif

            </div>
        </div>
    @endif

    <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary">Kembali ke Beranda</a>
</div>
@endsection
