<?php

namespace App\Http\Livewire\Website\Auction\AuctionDetails;

use App\Entities\Auction;
use Livewire\Component;

class CurrentPrice extends Component
{
    public Auction $auction;

    public float $currentPrice;

    protected function getListeners()
    {
        return [
            "echo:auctions.{$this->auction->id},BidCreated" => "biddingAdded",
        ];
    }

    public function mount()
    {
        $this->setCurrentPrice();
    }

    public function render()
    {
        return view('livewire.website.auction.auction-details.current-price');
    }

    protected function setCurrentPrice()
    {
        if($this->auction->current_price >0 )
            $this->currentPrice = $this->auction->current_price;
        else
            $this->currentPrice = $this->auction->start_price;
    }

    public function biddingAdded()
    {
        $this->setCurrentPrice();
    }
}
