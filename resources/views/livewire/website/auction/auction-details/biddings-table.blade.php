<div class="history-wrapper">
        <div class="item">
            <h5 class="title">Bid History</h5>
            <div class="history-table-area">
                <table class="history-table">
                    <thead>
                    <tr>
                        <th>Bidder</th>
                        <th>date</th>
                        <th>time</th>
                        <th>unit price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bids as $index => $bid)
                        <tr>
                            <td data-history="bidder">
                                <div class="user-info">
                                    <div class="thumb">
                                        <img src="{{asset_website("/images/history/01.png")}}" alt="history">
                                    </div>
                                    <div class="content">
                                        {{$bid->client->name}}
                                    </div>
                                </div>
                            </td>
                            <td data-history="date">{{$bid->created_at->format("Y-m-d")}}</td>
                            <td data-history="time">{{$bid->created_at->format("h:i a")}}</td>
                            <td data-history="unit price">{{$bid->amount_price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($bids->hasMorePages())
                    <div class="text-center mb-3 mt-4">
                        <a href="#0" class="button-3" wire:click="loadMore()">Load More</a>
                    </div>
                @endif
            </div>
        </div>
</div>
