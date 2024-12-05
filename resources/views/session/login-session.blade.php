@extends('layouts.user_type.guest')

@section('content')

<main class="main-content mt-0">
  <section>
    <div class="page-header min-vh-100" style="background-image: url('{{ asset('assets/img/foto-pertamina.png') }}'); background-size: cover; background-position: center;">
      <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="col-lg-5 col-md-8">
          <div class="card shadow-lg border-0">
            <div class="card-header text-center bg-white">
              <!-- Logo yang lebih besar -->
              <img src="{{ asset('assets/img/pertamina-logo.png') }}" alt="Pertamina Logo" style="width: 250px;">
            </div>
            <div class="card-body">
              <!-- Welcome Back dekat form -->
              <h4 class="font-weight-bold text-center text-primary mb-4"><strong>Selamat Datang!</strong></h4>
              <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                  <label class="form-label" for="email">Email</label>
                  <input type="email" class="form-control border border-primary" name="email" id="email" placeholder="Masukkan Email Anda" value="" required>
                  @error('email')
                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" class="form-control border border-primary" name="password" id="password" placeholder="Masukkan Kata Sandi Anda" required>
                  @error('password')
                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" name="rememberMe" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Sign In</button>
              </form>
            </div>
            <div class="card-footer bg-white text-center">
              <p class="text-muted mb-2">
                Lupa kata sandi? <a href="/login/forgot-password" class="text-primary fw-bold"><strong>Ubah Kata Sandi</strong></a>
              </p>
              <p class="text-muted">
                Belum memiliki akun? <a href="register" class="text-primary fw-bold"><strong>Daftar</strong></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection