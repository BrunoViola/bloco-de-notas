@extends('layouts.main_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
                    <div class="card-body p-5">
                        <!-- logo -->
                        <div class="text-center mb-4">
                            <img src="assets/images/logo.png" alt="Notes logo" class="img-fluid" style="max-width: 200px;">
                        </div>

                        <!-- form -->
                        <form action="/loginSubmit" method="post" novalidate>
                            @csrf

                            {{-- login inválido --}}
                            @if (session('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="mb-4">
                                <label for="user_email" class="form-label fw-semibold">
                                    <i class="fas fa-envelope me-2"></i>Username
                                </label>
                                <input type="email"
                                    class="form-control form-control-lg bg-light border-2 @error('user_email') is-invalid @enderror"
                                    name="user_email" id="user_email" placeholder="Digite seu email"
                                    value="{{ old('user_email') }}" required style="border-radius: 10px;">
                                @error('user_email')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-times-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="text_password" class="form-label fw-semibold">
                                    <i class="fas fa-lock me-2"></i>Password
                                </label>
                                <input type="password"
                                    class="form-control form-control-lg bg-light border-2 @error('text_password') is-invalid @enderror"
                                    name="text_password" id="text_password" placeholder="Digite sua senha"
                                    value="{{ old('text_password') }}" required style="border-radius: 10px;">
                                @error('text_password')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-times-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg fw-semibold"
                                    style="border-radius: 10px; padding: 12px;">
                                    <i class="fas fa-sign-in-alt me-2"></i>ENTRAR
                                </button>
                            </div>
                        </form>

                        <!-- copy -->
                        <div class="text-center text-muted mt-4 pt-3 border-top">
                            <small>
                                <i class="far fa-copyright me-1"></i><?= date('Y') ?> | by Bruno Henrique Silva Viola
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
