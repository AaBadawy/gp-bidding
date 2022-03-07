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
    /**
     * register new client
     * This method always expect the coming request is JSON.
     * @param RegisterRequest $request
     */
    public function __invoke(RegisterRequest $request)
    {
        $request->merge([
            'password' => $request->password
        ]);

        $client = Client::create();
        $user = $client->user()->create($request->only(['name' , 'email' , 'password']));

        $client->assignRole('client');
        Auth::login($user);
        return $user->userable->login();
    }
}
