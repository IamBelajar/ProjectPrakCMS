<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center text-primary fw-bold" href="{{ route('pendaftar.index') }}">
            <img src="https://img.icons8.com/fluency/32/000000/family.png" alt="Logo" class="me-2"/>
            Layanan KK
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-2">
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary rounded-pill px-4" href="{{ route('pendaftar.form') }}">
                        📝 Pendaftaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-success rounded-pill px-4" href="{{ route('pendaftar.cetak') }}">
                        🖨️ Cetak KK
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-success rounded-pill px-4" href="{{ route('form.cek.pendaftar') }}">
                        Cek
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
