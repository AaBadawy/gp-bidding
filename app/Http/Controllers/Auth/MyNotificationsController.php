<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class MyNotificationsController extends Controller
{

    public function __invoke()
    {
        return view("profile.notifications");
    }

}
