<?php

namespace App\Http\Controllers\Website\Profile;

use App\Http\Controllers\Controller;
use function view;

class MyInvolvedAuctionsController extends Controller
{

    public function __invoke()
    {
        return view("website.profile.my-involved-auctions");
    }
}
