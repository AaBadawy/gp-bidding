<?php

namespace App\Http\Controllers\Website\Auction;

use App\Entities\Auction;
use App\Http\Controllers\Controller;
use function view;

class AuctionDetailsController extends Controller
{


    public function __invoke(Auction $auction)
    {
        $auction->load(["biddings.client","lastBiding","bidders"])->loadCount(["biddings"]);


        return view("website.auctions.auction-details",['auction' => $auction]);
    }
}
