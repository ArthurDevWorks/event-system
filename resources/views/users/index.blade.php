@extends('layouts.admin')

@section('content')
    <div class="card mt-5 mb-4 border-dark shadow" style="background-color: #1e1e1e; color: #e0e0e0;">
        <div class="card-header d-flex justify-content-between align-items-center border-secondary" 
             style="background-color: #121212; color: #e0e0e0;">
            <h5 class="mb-0">Listar Usuários</h5>
            <a href="{{ route('user.create') }}" class="btn btn-outline-light btn-sm">Cadastrar</a>
        </div>

        <div class="card-body">
            <x-alert/>

            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead class="border-secondary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-outline-secondary btn-sm">Visualizar</a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-light btn-sm">Editar</a>

                                    <form method="POST" action="{{ route('user.destroy', $user->id) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este usuário?')" 
                                                class="btn btn-outline-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Nenhum usuário encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
