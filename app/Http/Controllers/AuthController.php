<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    function loginProcess(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Email or Username is required',
                'password.required' => 'Password is required',
            ]
        );

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $data = [
            $fieldType => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            if (Auth::user()->is_admin == 0) {
                return redirect('admin');
            } else {
                return redirect('dashboard');
            }

        } else {
            return redirect('/login')->withErrors('Email/Username or password not registered')->withInput();
        }

    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}