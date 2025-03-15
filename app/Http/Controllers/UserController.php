<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->get();

        //Carregar a view index
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('users.show',['user' => $user]);
    }

    public function create()
    {
        //Carregar a view cadastrar
        return view('users.create');
    }

    public function store(UserStoreRequest $request)
    {
        $request->validated();

        //Criação do usuario
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        //Redirect com mensagem de sucesso
        return redirect()->route('user.index')->with('sucess', 'Usuario cadastrado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $request->validated();

        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
        ]);

        //Redirect com mensagem de sucesso
        return redirect()->route('user.show',['user' => $user->id])->with('sucess', 'Usuario atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        //Redirect com mensagem de sucesso
        return redirect()->route('user.index')->with('sucess', 'Usuario deletado com sucesso!');
    }
}
