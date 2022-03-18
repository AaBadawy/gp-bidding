<?php

namespace App\Http\Controllers\Website;

use App\Entities\Auction;

class AuctionDetailsController
{


    public function __invoke(Auction $auction)
    {
        $auction->load(["biddings.client","lastBiding","bidders"])->loadCount(["biddings"]);


        return view("website.auctions.auction-details",['auction' => $auction]);
    }
}
