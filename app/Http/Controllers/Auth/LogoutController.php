<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        // todo implement logout function
        if(! auth()->logout())
            return redirect()->back()->withErrors(['un expected error']);

        return redirect()->route('/');
    }
}
