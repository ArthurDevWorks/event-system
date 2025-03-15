@extends('layouts.auth')

@section('content')
    <main class="login-container">
        <div class="login-card">
            <div class="text-center mb-4">
                <h4 class="mt-2">Acesse sua conta</h4>
            </div>
            
            <x-alert />

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Senha</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha" 
                               value="{{ old('password') }}" required>
                        <span class="input-group-text" role="button" onclick="togglePassword('password', this)">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary w-100 mb-3">Entrar</button>

                <!-- Link para "Esqueci a senha" -->
                <div class="text-center">
                    <a href=" {{ route('login.create') }} " class="text-decoration-none">
                        Cadastrar
                    </a>
                </div>
            </form>
        </div>
    </main>
@endsection