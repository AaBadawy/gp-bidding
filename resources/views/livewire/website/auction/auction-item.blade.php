<div class="col-sm-10 col-md-6 col-lg-4">
    <div class="auction-item-2">
        <div class="auction-thumb">
            <a href="./product-details.html">
                <img src="{{$auction->products()->first()->getFirstMediaUrl('main_image')}}" alt="jewelry">
            </a>
            <a href="#0" class="rating"><i class="far fa-star"></i></a>
            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
        </div>
        <div class="auction-content">
            <h6 class="title" >
                <a href="./product-details.html">{{$auction->name}}</a>
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
                <a href="#0" class="custom-button">Submit a bid</a>
            </div>
        </div>
    </div>
</div>
