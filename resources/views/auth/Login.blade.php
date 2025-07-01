@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-5 bg-white">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-success">👨‍👩‍👧‍👦 Login Layanan KK</h2>
                        <p class="text-muted">Masuk untuk mengelola pengajuan dan pencetakan Kartu Keluarga.</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="form-control border-start-0" 
                                    placeholder="contoh@email.com"
                                    required 
                                    autofocus
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    class="form-control border-start-0" 
                                    placeholder="********"
                                    required
                                >
                            </div>
                        </div>

                        @error('email')
                            <div class="text-danger mb-3 text-center">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-success w-100 fw-semibold py-2">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Login
                        </button>

                        <div class="text-center mt-4">
                            <p class="mb-0">Belum punya akun? 
                                <a href="{{ route('register') }}" class="text-decoration-none text-primary fw-semibold">
                                    Daftar di sini
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
