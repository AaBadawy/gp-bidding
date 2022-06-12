<?php

namespace App\Http\Controllers\Website\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;

class MyChatsController extends Controller
{

    public function __invoke()
    {
        $directTo = null;
        if(request()->filled('directTo')) {
            $directTo = User::query()->find(request()->input('directTo'));
        }
        return view("website.profile.my-chats",compact('directTo'));
    }
}
