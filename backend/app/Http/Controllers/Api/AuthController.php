<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        User::create($data);

        return response()->json([
            'message' => 'Usuário criado com sucesso.'
        ], 200);
    }


    public function login(Request $request)
    {
        $login = $request->only('email', 'password');

        if(Auth::attempt($login)){
            $token = $request->user()->createToken('token');
            return response()->json([
                'token' => $token->plainTextToken
            ]);
        }

        return response()->json([
            'error' => 'Dados não conferem.'
        ], 401);
    }
}
