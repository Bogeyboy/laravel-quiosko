<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        //Revisamos si el password es válido
        if(!Auth::attempt($data)){
            return response([
                'errors' => ['El email o el password son incorrectos']
            ],422);
        }
        //Autenticar al usuario
        $user = Auth::user();
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }

    public function logout(Request $request)
    {

    }
}
