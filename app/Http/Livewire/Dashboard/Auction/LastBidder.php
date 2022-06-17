<?php

namespace App\Http\Livewire\Dashboard\Auction;

use App\Entities\Auction;
use App\Models\User;
use Livewire\Component;

class LastBidder extends Component
{

    public Auction $auction;

    public null|User $lastBidder = null;

    public bool $isWinner = false;

    protected function getListeners()
    {
        return [
            "echo:auctions.{$this->auction->id},BidCreated" => "getLastBidder",
        ];
    }

    public function mount()
    {
        $this->getLastBidder();
    }

    public function render()
    {
        return view('livewire.dashboard.auction.last-bidder');
    }

    public function getLastBidder()
    {
        $this->lastBidder = $this->auction?->lastBiding?->client;

        if($this->auction->winner()->exists())
            $this->isWinner = true;
    }

    public function block()
    {
        dd('will be blocked');
    }
}
