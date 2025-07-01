@auth
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="{{ route('pendaftar.index') }}">
            <img src="https://img.icons8.com/fluency/32/000000/family.png" alt="Logo" class="me-2">
            Layanan KK
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav align-items-center gap-lg-2 gap-1">

                {{-- Tombol Menu --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'pendaftar.form' ? 'active text-primary fw-bold' : '' }}"
                       href="{{ route('pendaftar.form') }}">
                       📝 Pendaftaran
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'pendaftar.cetak' ? 'active text-success fw-bold' : '' }}"
                       href="{{ route('pendaftar.cetak') }}">
                       🖨️ Cetak KK
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'form.cek.pendaftar' ? 'active text-info fw-bold' : '' }}"
                       href="{{ route('form.cek.pendaftar') }}">
                       🔍 Cek Data
                    </a>
                </li>

                {{-- Sapaan Pengguna --}}
                <li class="nav-item d-none d-lg-block px-2">
                    <span class="nav-link text-dark">
                        👋 Halo, <strong>{{ auth()->user()->email }}</strong>
                    </span>
                </li>

                {{-- Logout --}}
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3" type="submit">
                            🚪 Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endauth
