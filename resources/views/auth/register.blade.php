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

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Formulário em uma única coluna -->
            <div class="form-row">
                <!-- Nome Completo -->
                <div class="input-group">
                    <label for="name" class="input-label">{{ __('Nome Completo') }}</label>
                    <input id="name" type="text" class="input-field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Digite seu nome completo">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email Institucional -->
                <div class="input-group">
                    <label for="email" class="input-label">{{ __('Email Institucional') }}</label>
                    <input id="email" type="email" class="input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Digite seu email institucional">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Senha -->
                <div class="input-group">
                    <label for="password" class="input-label">{{ __('Senha') }}</label>
                    <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Digite sua senha">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirmar Senha -->
                <div class="input-group">
                    <label for="password-confirm" class="input-label">{{ __('Confirmar Senha') }}</label>
                    <input id="password-confirm" type="password" class="input-field" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme sua senha">
                </div>

                <!-- Foto do Usuário -->
                <div class="input-group">
                    <label for="photo" class="input-label">{{ __('Foto do Usuário') }}</label>
                    <input id="photo" type="file" class="input-field @error('photo') is-invalid @enderror" name="photo" required>
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Perfil de Acesso -->
                <div class="input-group">
                    <label for="role_id" class="input-label">{{ __('Perfil de Acesso') }}</label>
                    <select id="role_id" class="input-field select-field @error('role_id') is-invalid @enderror" name="role_id" required>
                        <option value="" disabled selected>Selecione um perfil</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Status -->
                <div class="input-group">
                    <label for="status" class="input-label">{{ __('Status') }}</label>
                    <select id="status" class="input-field select-field @error('status') is-invalid @enderror" name="status" required>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-login">Cadastrar</button>

            <p class="no-account">Já tem uma conta? <a href="{{ route('login') }}" class="text-purple">Entrar</a></p>
        </form>
    </div>
</div>
@endsection
