<?php

namespace App\Observers;

use App\Entities\AuctionRating;
use App\Entities\Product;

class AuctionRatingObserver
{
    public function creating(AuctionRating $auctionRating)
    {
        $product = Product::with('vendor','auction')->find(request()->product_id);
        $auctionRating->client_id = auth()->user()->id;
        $auctionRating->vendor_id = $product->vendor->id;
        $auctionRating->auction_id = $product->auction ? $product->id : null;
        $auctionRating->product_title = $product->name;
    }

    public function updating(AuctionRating $auctionRating)
    {
        $product = Product::with('vendor','auction')->find(request()->product_id);
        $auctionRating->client_id = auth()->user()->id;
        $auctionRating->vendor_id = $product->vendor->id;
        $auctionRating->auction_id = $product->auction->id;
        $auctionRating->product_title = $product->name;
    }
}
