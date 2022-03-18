<?php

namespace App\Http\Livewire\Website\Auction\AuctionDetails;

use App\Entities\Auction;
use Livewire\Component;

class AuctionStats extends Component
{
    public Auction $auction;

    protected $listeners = ["bidCreated" => '$refresh'];

    public function render()
    {
        return view('livewire.website.auction.auction-details.auction-stats');
    }
}
