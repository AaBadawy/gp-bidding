<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('vendor.adminlte.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(! Auth::attempt($credential))
            return redirect()->back()->withErrors(['credential' => 'invalid email or password']);

        return redirect('/');
    }
}
