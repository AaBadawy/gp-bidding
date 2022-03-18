<div class="product-bid-area">
    <form class="product-bid-form">
        <div class="search-icon">
            <img src="{{asset_website("/images/product/search-icon.png")}}" alt="product">
        </div>
        @can("create",[\App\Entities\Bidding::class,$auction])
            <input type="text" class="@error("bidAmount")border-danger @enderror" placeholder="Enter you bid amount" wire:model="bidAmount">
            <button type="button" class="custom-button" wire:click="bid">Submit a bid</button>
        @else
            <h5 class="text-info">Cant Make bid on current Auction Right Now</h5>
        @endcan
        @error("bidAmount")
        <div class="mt-2 ml-5 pl-5 mb-1">
            <p class="text-danger font-weight-bold">{{$message}}</p>
        </div>
        @enderror
    </form>
</div>
