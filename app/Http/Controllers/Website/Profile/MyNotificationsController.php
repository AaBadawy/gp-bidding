<?php

namespace App\Http\Controllers\Website\Profile;

use App\Http\Controllers\Controller;

class MyNotificationsController extends Controller
{

    public function __invoke()
    {
        return view("website.profile.my-notifications");
    }
}
