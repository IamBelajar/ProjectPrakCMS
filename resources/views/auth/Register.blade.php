@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5 bg-light">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-success">✨ Registrasi Akun Baru</h2>
                        <p class="text-muted">Silakan isi form di bawah ini untuk membuat akun Anda.</p>
                    </div>

                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="form-control border-start-0" 
                                    placeholder="you@example.com"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-lock"></i>
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

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <input 
                                    type="password" 
                                    name="password_confirmation" 
                                    id="password_confirmation" 
                                    class="form-control border-start-0" 
                                    placeholder="********"
                                    required
                                >
                            </div>
                        </div>

                        @error('email')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-success w-100 py-2 fw-semibold">
                            <i class="bi bi-person-plus me-2"></i> Register
                        </button>

                        <div class="text-center mt-4">
                            <p class="mb-0">Sudah punya akun? 
                                <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">
                                    Login di sini
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
