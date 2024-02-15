<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('mypage');
        } else {
            return redirect('login')->with('result', 'メールアドレスまたはパスワードが間違っています');
        }
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        try {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);

            return redirect('thanks');

        } catch (\Throwable $th) {
            return redirect('register')->with('result', '予期せぬエラーが発生しました');
        }
    }

    public function getThanks()
    {
        return view('auth.thanks');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function logoutGetRegister()
    {
        Auth::logout();
        return redirect('register');
    }
}
