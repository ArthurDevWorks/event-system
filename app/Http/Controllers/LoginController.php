<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Email;

class loginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function loginProcess(LoginRequest $request)
    {
        $request->validated();

        $authenticated = Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        if(!$authenticated)
        {
            return back()->withInput()->with('error', 'Email ou senha inválido !');
        }

        $user = Auth::user();
        $user = User::find($user->id);

        return redirect()->route('user.index');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login')->with('sucess','Deslogado com sucesso !');
    }

    public function create()
    {
        return view('login.create');
    }

    public function store(UserStoreRequest $request)
    {
        $request->validated();

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
        ]);

        //Redirect com mensagem de sucesso
        return redirect()->route('login')->with('sucess', 'Usuario cadastrado com sucesso!');
    }
}
