@extends('layouts.admin')

@section('content')
    <div class="card mt-5 mb-4 border-dark shadow" style="background-color: #1e1e1e; color: #e0e0e0;">
        <div class="card-header d-flex justify-content-between align-items-center border-secondary" 
             style="background-color: #121212; color: #e0e0e0;">
            <h5 class="mb-0">Detalhes do Usuário</h5>
            <div class="d-flex">
                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary btn-sm me-2">Listar</a>
                <a href="{{ route('user.edit', ['user'=> $user->id]) }}" class="btn btn-outline-warning btn-sm me-2">Editar</a>
                <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
                        Excluir
                    </button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <x-alert />

            <dl class="row">
                <dt class="col-sm-3 fw-bold">ID</dt>
                <dd class="col-sm-9">{{ $user->id }}</dd>

                <dt class="col-sm-3 fw-bold">Nome</dt>
                <dd class="col-sm-9">{{ $user->name }}</dd>

                <dt class="col-sm-3 fw-bold">Email</dt>
                <dd class="col-sm-9">{{ $user->email }}</dd>

                <dt class="col-sm-3 fw-bold">Cadastrado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}</dd>

                <dt class="col-sm-3 fw-bold">Última Atualização</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i') }}</dd>
            </dl>
        </div>
    </div>
@endsection