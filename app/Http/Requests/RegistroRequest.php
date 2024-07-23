<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
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
            'name' => ['required','string'],
            'email' => ['required','email','unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(8)
                    ->letters()
                    ->symbols()
                    ->numbers()
            ]
        ];
    }

    /* Función para los mensaje de validación personalizados */
    public function messages()
    {
        return [
            'name' => 'El nombre del usuario es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser válido',
            'email.unique' => 'El usuario con ese email ya se encuentra registrado',
            'password.required' => 'El password es obligatorio',
            //'password' => 'El password debe contener al menos 8 caracteres, un símbolo y un número.'
        ];
    }
}
