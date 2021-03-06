<?php

namespace App\Http\Livewire\Website\Auction\AuctionDetails;

use App\Entities\Auction;
use App\Entities\Bidding;
use App\Events\BidCreated;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class BidAuction extends Component
{
    use AuthorizesRequests;

    public Auction $auction;

    public float $lastBid;

    public  $bidAmount = 0;


    protected function getListeners()
    {
        return
            [
                "bidCreated" => 'lastBid',
                "echo:auctions.{$this->auction->id},BidCreated" => '$refresh',
            ];
    }

    protected function rules():array
    {
        return [
            "bidAmount" => ["required","numeric","gte:{$this->auction->bidding_price}"]
        ];
    }

    public function mount()
    {
        $this->lastBid();
    }

    public function updated($attributeName)
    {
        $this->validateOnly($attributeName);
    }

    public function render()
    {
        return view('livewire.website.auction.auction-details.bid-auction');
    }

    public function lastBid()
    {
        $this->lastBid = $this->auction->lastBiding()->value("amount_price") ?: 0;
    }

    public function bid()
    {
        $this->authorize('create',[Bidding::class,$this->auction]);

        $this->validate();

        $this->auction->biddings()->create([
            "client_id"     => auth()->id(),
            "amount_price"  => $this->bidAmount,
        ]);

        $last_bid_price = $this->auction->lastBiding()->value("amount_price");
        if($this->auction->current_price > 0)
            $this->auction->update(['current_price' =>  $this->auction->current_price + $last_bid_price]);
        else
            $this->auction->update(['current_price' => $this->auction->start_price + $last_bid_price]);

        $this->emit("bidCreated");
    }
}
