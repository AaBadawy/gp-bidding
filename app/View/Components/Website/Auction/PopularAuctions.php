<?php

namespace App\View\Components\Website\Auction;

use App\Repositories\Contracts\AuctionRepository;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class PopularAuctions extends Component
{
    /**
     * @var \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     */
    public Collection $auctions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(protected AuctionRepository $auctionRepository,public string $class)
    {
        $this->popularAuctions();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website.auction.popular-auctions');
    }

    private function popularAuctions()
    {
        $this->auctions =  $this
            ->auctionRepository
            ->scopeQuery(function ($query){
                return $query->limit(3)->popular();
            })->get();
    }
}
