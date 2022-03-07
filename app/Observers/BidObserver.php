<?php

namespace App\Observers;

use App\Entities\Auction;
use App\Entities\Bidding;

class BidObserver
{
    public function creating(Bidding $bidding)
    {
        $auction = Auction::with(['biddings'])->find(request()->auction_id);
        if(! $auction->biddings->count())
            $bidding->amount_price = $auction->start_price + $auction->bidding_price;
        else
            $bidding->amount_price = Bidding::where('auction_id',request()->auction_id)->get()->last()->amount_price + $auction->bidding_price;
        $bidding->client_id = auth()->user()->userable->id;
    }
}
