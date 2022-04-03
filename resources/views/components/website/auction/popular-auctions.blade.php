<!--============= Feture Auction Section Starts Here =============-->
<section class="{{$class}}" data-background="{{asset_website("/images/auction/featured/featured-bg-1.jpg")}}">
    <div class="container">
        <div class="section-header">
            <h2 class="title">Featured Items</h2>
            <p>Bid and win great deals,Our auction process is simple, efficient, and transparent.</p>
        </div>
        <div class="row justify-content-center mb-30-none">
            @foreach($auctions as $auction)
                <livewire:website.auction.auction-item :auction="$auction" />
            @endforeach
        </div>
    </div>
</section>
<!--============= Feture Auction Section Ends Here =============-->
