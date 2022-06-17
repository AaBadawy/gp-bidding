<div>
    <div class="product-details-slider-top-wrapper">
        <div class="product-details-slider owl-theme owl-carousel" id="sync1">
            @foreach($products as $product)
                <div class="slide-top-item">
                    <div class="slide-inner">
                        <img src="{{$product->getFirstMediaUrl("main_image")}}" style ="width: 1110px; object-fit: none;height: 585px;" alt="product">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @if($products->count() > 1)
        <div class="product-details-slider-wrapper">
            <div class="product-bottom-slider owl-theme owl-carousel" id="sync2">
                @foreach($products as $product)
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{$product->getFirstMediaUrl("main_image")}}" style ="width: 121px; height: 121px;" alt="product">
                        </div>
                    </div>
                @endforeach
            </div>
            <span class="det-prev det-nav">
                        <i class="fas fa-angle-left"></i>
                    </span>
            <span class="det-next det-nav active">
                        <i class="fas fa-angle-right"></i>
                    </span>
        </div>
    @endif
</div>
