<?php

namespace App\Http\Controllers\Auth;

use App\Entities\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function registerView()
    {
        return view("auth.register");
    }

    /**
     * register new client
     * This method always expect the coming request is JSON.
     * @param RegisterRequest $request
     */
    public function register(RegisterRequest $request)
    {
        $request->merge([
            'password' => $request->password,
            'type'      => "client",
        ]);


        $user = User::create($request->only(['name' , 'email' , 'password']));

        Auth::login($user);

        return view("website.main");

    }
}
