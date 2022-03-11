<?php

namespace App\Http\Livewire\Website\Auction;

use App\Entities\Auction;
use Livewire\Component;
use function view;

class AuctionItem extends Component
{
    public Auction $auction;

    public function render()
    {
        return view('livewire.website.auction.auction-item');
    }
}
