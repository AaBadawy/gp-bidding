<?php

namespace App\Observers;

use App\Entities\Auction;
use App\Entities\Product;

class AuctionObserver
{
    public function creating(Auction $auction)
    {
//        if(auth()->user()->userable::TYPE == 'vendor')
//            $auction->vendor_id = auth()->user()->userable->vendor->id;
    }
    /**
     * @param Auction $auction
     */
    public function created(Auction $auction)
    {
//        Product::whereIn('id',request()->product_ids)->update(['auction_id' => $auction->id]);
    }
}
