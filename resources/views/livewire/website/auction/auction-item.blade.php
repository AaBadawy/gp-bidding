<div @class(["col-sm-10 col-md-6","col-lg-4" => isset($lgClass)])>
    <div class="auction-item-2">
        <div class="auction-thumb">
            <a href="{{route("website.auction.details",['auction' => $auction->id])}}">
                <img src="{{$auction->products()->limit(1)->first()?->getFirstMediaUrl('main_image') ?: asset_website("images/auction/upcoming/upcoming-1.png")}}" alt="jewelry">
            </a>
            <livewire:website.watching.fast-watch :auction="$auction" />
            <a href="{{route("website.auction.details",['auction' => $auction->id])}}" class="bid"><i class="flaticon-auction"></i></a>
        </div>
        <div class="auction-content">
            <h6 class="title" >
                <a href="{{route("website.auction.details",['auction' => $auction->id])}}">{{$auction->name}}</a>
            </h6>
            <div class="bid-area">
                <div class="bid-amount">
                    <div class="icon">
                        <i class="flaticon-auction"></i>
                    </div>
                    <div class="amount-content">
                        <div class="current">Current Bid</div>
                        <div class="amount">Egp {{$auction->current_price ?: $auction->start_price}}</div>
                    </div>
                </div>
            </div>
            <div class="countdown-area">
                <div class="countdown">
                    <div id="bid_counter1" data-endDate="{{$auction->end_at->format('Y/m/d H:I')}}"></div>
                </div>
                <span class="total-bids">{{$biddingNumber}} Bids</span>
            </div>
            <div class="text-center">
                <a href="{{route("website.auction.details",['auction' => $auction->id])}}" class="custom-button">See More</a>
            </div>
        </div>
    </div>
</div>
