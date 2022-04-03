<?php

namespace App\Http\Controllers\Website\Auction;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\AuctionRepository;

class AllAuctionsController extends Controller
{

    public function __construct(protected AuctionRepository $auctionRepository)
    {

    }


    public function __invoke()
    {
        $auctions  = $this->auctionRepository->paginate(request()->per_page);

        return view("website.auctions.index",compact('auctions'));
    }
}
