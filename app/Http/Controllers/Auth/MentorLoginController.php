<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.mentor-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('mentor')->attempt($credentials)) {
            return redirect()->intended('/dashboard'); // Altere para a rota que deseja redirecionar após o login
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }}
