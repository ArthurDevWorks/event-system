<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email'     => 'required| email',
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
            'password.required' => 'Senha obrigatória',
            'password.confirmed'=> 'As senhas devem ser iguais.',
            'password.min'      => 'Senha com no mínimo :min caracteres',
        ];
    }
}
