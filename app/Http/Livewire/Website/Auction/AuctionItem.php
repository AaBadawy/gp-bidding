<?php

namespace App\Http\Livewire\Website\Auction;

use App\Entities\Auction;
use Livewire\Component;
use function view;

class AuctionItem extends Component
{
    public Auction $auction;

    public int $currentPrice;

    public int $biddingNumber;

    protected function getListeners()
    {
        return [
            "echo:auctions.{$this->auction->id},BidCreated" => "biddingAdded",
        ];
    }

    public function mount()
    {
        $this->setCurrentPrice();
        $this->setNumberOfBids();
    }

    public function render()
    {
        return view('livewire.website.auction.auction-item');
    }

    public function biddingAdded()
    {
        $this->setCurrentPrice();
        $this->setNumberOfBids();
    }

    public function setCurrentPrice()
    {
        $this->currentPrice = (int) $this->auction->lastBidding()->value('amount_price');
    }

    public function setNumberOfBids()
    {
        $this->biddingNumber = $this->auction->biddings()->count();
    }
}
