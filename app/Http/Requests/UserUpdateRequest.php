<?php

namespace App\Http\Requests;

use auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,'.$this->user->id,
            'password'  => 'required|confirmed|min:6'
        ];
    }

    //Função que personaliza as mensagens de validação.
    public function messages() : array 
    {
        return[
            'name.required'     => 'Nome obrigatório.',
            'email.required'    => 'Email obrigatório.',
            'email.email'       => 'Insira um email válido.',
            'email.unique'      => 'Já existe um email cadastrado com este endereço.',
            'password.required' => 'Senha obrigatória',
            'password.confirmed'=> 'As senhas devem ser iguais.',
            'password.min'      => 'Senha com no mínimo :min caracteres',
        ];
    }
}
