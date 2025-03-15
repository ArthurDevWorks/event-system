@extends('layouts.admin')

@section('content')
    <div class="card mt-5 mb-4 border-dark shadow" style="background-color: #1e1e1e; color: #e0e0e0;">
        <div class="card-header d-flex justify-content-between align-items-center border-secondary" 
             style="background-color: #121212; color: #e0e0e0;">
            <h5 class="mb-0">Criar Usuário</h5>
            <a href="{{ route('user.index') }}" class="btn btn-outline-light btn-sm">Listar</a>
        </div>
        
        <div class="card-body">
            <x-alert/>
            
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                @method('POST')
                
                <div class="mb-3 col-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nome Completo" 
                        value="{{ old('name') }}" required style="background-color: #2d2d2d; color: #e0e0e0; border-color: #444;">
                </div>
                
                <div class="mb-3 col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" 
                        value="{{ old('email') }}" required style="background-color: #2d2d2d; color: #e0e0e0; border-color: #444;">
                </div>
                

                <div class="row">

                    <div class="mb-3 col-6">
                        <label for="password" class="form-label">Senha</label>
                        <div class="input-group">
                             <input type="password" name="password" id="password" class="form-control" placeholder="Senha" value="{{ old('password') }}" 
                            required style="background-color: #2d2d2d; color: #e0e0e0; border-color: #444;">
                             <span class="input-group-text" role="button" onclick="togglePassword('password',this)"> <i class="bi bi-eye"></i> </span>
                        </div>
                    </div>

                    <div class="mb-3 col-6">
                        <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Senha" value="{{ old('password_confirmation') }}"
                                required style="background-color: #2d2d2d; color: #e0e0e0; border-color: #444;">
                                <span class="input-group-text" role="button" onclick="togglePassword('password_confirmation',this)"> <i class="bi bi-eye"></i> </span>
                        </div>
                    </div>
                </div>

                
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-end">
                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection