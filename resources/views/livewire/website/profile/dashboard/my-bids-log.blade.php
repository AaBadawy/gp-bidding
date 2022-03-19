<div class="dashboard-widget">
    <h5 class="title mb-10">Purchasing</h5>
    <div class="dashboard-purchasing-tabs">
        <ul class="nav-tabs nav">
            <li>
                <a href="#current" class="active" data-toggle="tab">My Bids</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane show active fade" id="current">
                <table class="purchasing-table">
                    <thead>
                    <th>Auction ID#</th>
                    <th>Bid Price</th>
                    <th>Highest Bid</th>
                    <th>Lowest Bid</th>
                    <th>Expires At</th>
                    </thead>
                    <tbody>
                    @foreach($auctions as $auction)
                        <tr>
                            <td data-purchase="item">{{$auction->name}}</td>
                            <td data-purchase="bid price">{{$auction->pivot?->amount_price}}</td>
                            <td data-purchase="highest bid">{{$auction->maxBid?->amount_price}}</td>
                            <td data-purchase="lowest bid">{{$auction->minBid?->amount_price}}</td>
                            <td data-purchase="expires">{{$auction->end_at->format("Y/m/d")}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($auctions->hasMorePages())
                    <div class="text-center mb-3 mt-4">
                        <a href="#0" class="button-3" wire:click="loadMore()">Load More</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
