<?php

namespace App\Http\Livewire\Website\Auction\AuctionDetails;

use App\Entities\Auction;
use App\Entities\Bidding;
use Illuminate\Support\Collection;
use Livewire\Component;

class BiddingsTable extends Component
{
    public Auction $auction;

    public int $perPage = 10;

    protected function getListeners()
    {
        return [
            "bidCreated" => '$refresh'
        ];
    }

    public function render()
    {
        $bids = $this->getBids();

        return view('livewire.website.auction.auction-details.biddings-table',['bids' => $bids]);
    }

    public function getBids(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Bidding::query()->whereBelongsTo($this->auction)->latest()->paginate($this->perPage);
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
