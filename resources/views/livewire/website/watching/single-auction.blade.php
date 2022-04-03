<div class="single-product-item">
    <div class="thumb">
        <a href="#0"><img src="{{$auction->products()?->first()?->getFirstMediaUrl("main_image")}}" alt="shop"></a>
    </div>
    <div class="content">
        <h4 class="title"><a href="#0">{{$auction->name}}</a></h4>
        <div class="price"><span class="pprice">{{$auction->previewed_price}} Egp</span> <span class="dprice">current price</span></div>
        <a href="#" class="remove-cart" wire:click="remove">Remove</a>
    </div>
</div>
