<?php

namespace App\View\Components\Dashboard;

use App\Entities\Auction;
use Illuminate\View\Component;

class AuctionFastDetails extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Auction $auction)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.auction-fast-details');
    }
}
