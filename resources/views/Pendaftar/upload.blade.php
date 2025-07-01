<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Upload Gambar</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(14px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            padding: 30px 40px;
            width: 100%;
            max-width: 550px;
            color: #fff;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeInUp 1s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 26px;
            color: #ffffff;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #ffffffdd;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            margin-top: 5px;
            background-color: rgba(255,255,255,0.2);
            color: #fff;
        }

        input[type="file"]::file-selector-button {
            background-color: #3b5998;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #007acc;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #005f99;
        }

        img {
            margin-top: 20px;
            border-radius: 12px;
            max-width: 100%;
        }

        .btn-delete {
            background-color: #b71c1c;
        }

        .btn-delete:hover {
            background-color: #8e0000;
        }

        .btn-back {
            background-color: #455a64;
        }

        .btn-back:hover {
            background-color: #263238;
        }

        .preview-section {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="glass-card">
    <h2>Formulir Upload Gambar</h2>

    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Judul Gambar:</label>
        <input type="text" name="title" required>

        <label>Pilih Berkas Gambar:</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Upload</button>
    </form>

    @if (isset($image))
        <div class="preview-section">
            <h3>Gambar Berhasil Diunggah</h3>
            <p><strong>{{ $image->title }}</strong></p>
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gambar Diupload">

            <form id="deleteForm" action="{{ route('image.destroy', $image->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Hapus Gambar</button>
            </form>
        </div>
    @endif

    <form action="{{ route('pendaftar.index') }}" method="GET">
        <button type="submit" class="btn-back mt-3">Kembali</button>
    </form>
</div>

<script>
    @if(session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonColor: '#007acc'
        });
    @endif

    document.getElementById('deleteForm')?.addEventListener('submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Hapus gambar ini?',
            text: "Tindakan ini tidak bisa dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#b71c1c',
            cancelButtonColor: '#b2bec3'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        });
    });
</script>
</body>
</html>
