<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('home.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('post');
        }
        else
            return 0;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
