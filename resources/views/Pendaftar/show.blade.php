<!DOCTYPE html>
<html>
<head>
    <title>Detail Pendaftar</title>
</head>
<body>
    <h1>{{ $pendaftar['title'] }}</h1>

    @if ($pendaftar['title'] === 'Pengambilan nomor antrian')
        <form action="{{ url('/pengambilan-antrian') }}" method="POST">
            @csrf
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br><br>

            <label>NIK:</label><br>
            <input type="text" name="nik" required><br><br>

            <label>Alamat:</label><br>
            <input type="text" name="alamat" required><br><br>

            <label>Nomor Telepon:</label><br>
            <input type="text" name="telepon" required><br><br>

            <button type="submit">Submit</button>
        </form>

        {{-- Tampilkan hasil jika tersedia --}}
        @if(session('antrian'))
            <hr>
            <h3>Nomor Antrian</h3>
            <p>Terima kasih, </p>
            <p>Nomor antrian Anda adalah: <strong>{{ session('antrian')['nomor'] }}</strong></p>
        @endif

    @elseif ($pendaftar['title'] === 'Pengecekan status kk')
        <form action="{{ url('/cek-status-kk') }}" method="POST">
            @csrf
            <label>Masukkan NIK:</label><br>
            <input type="text" name="nik" required><br><br>

            <button type="submit">Cek Status</button>
        </form>

        {{-- Tampilkan hasil jika tersedia --}}
        @if(session('status_kk'))
            <hr>
            <h3>Hasil Cek KK</h3>
            <p>Status: <strong>{{ session('status_kk')['status'] }}</strong></p>
        @endif
    @endif
    

    <br>
    <a href="{{ url('/pendaftars') }}">Kembali ke Daftar Pendaftar</a>
</body>
</html>
