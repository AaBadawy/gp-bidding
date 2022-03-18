<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class MyProfileController extends Controller
{

    public function __invoke()
    {
        return view("website.profile.my-profile");
    }
}
