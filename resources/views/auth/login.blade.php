@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="right-section">
        <p>Sistema de Gestão Esportiva</p>
    </div>

    <div class="left-section">
        <div class="logo-container">
            <img class="logo" src="{{ mix('resources/image/logo.png') }}" alt="Logo">
            <span class="podium-text">Podium</span>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#4a4a4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M6 21v-2a6 6 0 0 1 12 0v2"></path>
                </svg>
                <input id="email" type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
            </div>

            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="input-group">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#4a4a4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="10" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <input id="password" type="password" name="password" placeholder="Senha" required>
            </div>

            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Lembrar senha</label>

                <!-- Link "Esqueceu a senha?" à direita -->
                <a href="{{ route('password.request') }}" class="forgot-password">Esqueceu a senha?</a>
            </div>

            <button type="submit" class="btn-login">ENTRAR</button>

            <!-- Link "Não possui conta?" abaixo do botão -->
            <p class="no-account">Não possui conta? <a href="/register" class="text-purple">Criar conta</a></p>
        </form>
    </div>
</div>
@endsection
