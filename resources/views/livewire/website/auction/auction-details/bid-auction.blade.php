<div class="product-bid-area">
    <form class="product-bid-form">
        <div class="search-icon">
            <img src="{{asset_website("/images/product/search-icon.png")}}" alt="product">
        </div>
        <input type="text" class="@error("bidAmount")border-danger @enderror" placeholder="Enter you bid amount" wire:model="bidAmount">
        <button type="button" class="custom-button" wire:click="bid">Submit a bid</button>
        @error("bidAmount")
        <div class="mt-2 ml-5 pl-5 mb-1">
            <p class="text-danger font-weight-bold">{{$message}}</p>
        </div>
        @enderror
    </form>
</div>
