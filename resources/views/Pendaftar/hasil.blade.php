<!DOCTYPE html>
<html>
<head>
    <title>Detail Pendaftar</title>
</head>
<body>
    <h1>{{ $pendaftar['title'] }}</h1>

    {{-- Hasil Pengambilan Nomor Antrian --}}
    @if (isset($nomor_antrian))
        <h2>Nomor Antrian Anda</h2>
        <p>Terima kasih, <strong>{{ $nama }}</strong>.</p>
        <p>Nomor Antrian Anda adalah: <strong>{{ $nomor_antrian }}</strong></p>

    {{-- Hasil Cek Status KK --}}
    @elseif (isset($status))
        <h2>Status Kartu Keluarga</h2>
        <p>NIK: <strong>{{ $nik }}</strong></p>
        <p>Status: 
            <strong>
                @if ($status === 'proses')
                    Sedang Diproses
                @else
                    Sudah Selesai
                @endif
            </strong>
        </p>

    {{-- Form Pengambilan Antrian --}}
    @elseif ($pendaftar['title'] === 'Pengambilan nomor antrian')
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

    {{-- Form Pengecekan Status KK --}}
    @elseif ($pendaftar['title'] === 'Pengecekan status kk')
        <form action="{{ url('/cek-status-kk') }}" method="POST">
            @csrf
            <label>Masukkan NIK:</label><br>
            <input type="text" name="nik" required><br><br>

            <button type="submit">Cek Status</button>
        </form>
    @endif

    <br>
    <a href="{{ url('/pendaftars') }}">Kembali ke Daftar Pendaftar</a>
</body>
</html>
