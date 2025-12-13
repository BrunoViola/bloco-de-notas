<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        // form validation
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
            ]
        );

        // get user input
        $userEmail = $request->input('user_email');
        $password = $request->input('text_password');

        // get user at database
        $user = User::where('user_email', $userEmail)
            ->where('deleted_at', null)
            ->first();

        // check credentials
        if (!$user || !password_verify($password, $user->password)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'E-mail ou senha incorretos!'); // returns to the previous page with the form data filled in and with an error
        }

        // update last_login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // login user (put user data in session)
        session([
            'user' => [
                'id' => $user->id,
                'user_email' => $userEmail
            ]
            ]);

        echo 'Login com sucesso!';
    }

    public function logout()
    {
        echo 'logout';
    }
}
