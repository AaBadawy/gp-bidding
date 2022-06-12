<?php

namespace App\Http\Controllers;

use App\Models\User;

class ChatPageController extends Controller
{


    public function __invoke()
    {
        $directTo = null;
        if(request()->filled("directTo"))
            $directTo = User::query()->findOrFail(request()->get("directTo"));
        return view("chats.my-chats",compact('directTo'));
    }
}
