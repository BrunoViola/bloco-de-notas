<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        // validação do formulário
        $request->validate(
        // rules
        [
            'user_email' => 'required|email|max:50',
            'text_password' => 'required|min:6|max:16'
        ],
        // messages
        [
            'user_email.required' => 'O e-mail deve ser preenchido',
            'user_email.email' => 'Deve ser um e-mail válido',
            'text_password.required' => 'O e-mail deve ser preenchido',
            'text_password.min' => 'A senha deve ter pelo menos :min caracteres',
            'text_password.max' => 'A senha deve ter no máximo :max caracteres'
        ]);

        // get user input
        $username = $request->input('user_email');
        $password = $request->input('text_password');

        // testando a conexão com o banco de dados
        try {
            DB::connection()->getPdo();
            echo "Conexão está ok!";
        } catch (\PDOException $e) {
            echo "Conexão falhou: " . $e->getMessage();
        }

        echo 'OK!';
    }

    public function logout()
    {
        echo 'logout';
    }
}
