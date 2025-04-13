<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pendaftar</title>
</head>
<body>
    <h1>Daftar Pendaftar</h1>
    <ul>
        @foreach ($pendaftars as $pendaftar)
            <li>
                <strong>{{ $pendaftar['title'] }}</strong><br>
                <a href="{{ url('/pendaftars/' . $pendaftar['id']) }}">Lihat Detail</a>
            </li>
            <hr>
        @endforeach
    </ul>
</body>
</html>
