<?php

namespace App\Http\Livewire\Website\Profile\Dashboard;

use Livewire\Component;

class MyBidsLog extends Component
{

    public int $perPage = 10;

    public function render()
    {
        $auctions = $this->getAuctions();

        return view('livewire.website.profile.dashboard.my-bids-log',['auctions' => $auctions]);
    }

    public function getAuctions()
    {
        return auth()->user()
            ->involvedAuctions()
            ->with(["maxBid","minBid"])
            ->latest()
            ->paginate($this->perPage);
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
