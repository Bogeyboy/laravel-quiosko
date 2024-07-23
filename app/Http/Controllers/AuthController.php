<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegistroRequest $request)
    {
        //Validando el registro
        $data = $request->validated();
        //Creando el usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        //Retornando una respuesta
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }
    public function login(Request $request)
    {

    }

    public function logout(Request $request)
    {

    }
}
