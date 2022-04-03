<?php

namespace App\Http\Livewire\Website\Watching;

use App\Entities\Auction;
use Livewire\Component;

class SingleAuction extends Component
{
    public Auction $auction;

    public function render()
    {
        return view('livewire.website.watching.single-auction');
    }

    public function remove()
    {
        watching()->remove($this->auction);

        $this->emitTo("website.watching.counter","auctionRemoved");

        $this->emitUp("auction-removed");
    }
}
