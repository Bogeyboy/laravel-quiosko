<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El campo email debe ser válido',
            'email.exists' => 'Ese correo electónico no existe en nuestros registros',
            'password' => 'El password es obligatorio'
        ];
    }
}
