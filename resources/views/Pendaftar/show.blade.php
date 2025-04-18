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
