<?php

namespace App\View\Components\Website\Auction\AuctionDetails;

use App\Entities\Auction;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ProductsImages extends Component
{
    public Collection $products;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Auction $auction)
    {
        $this->products = $this->auction->products;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website.auction.auction-details.products-images');
    }
}
