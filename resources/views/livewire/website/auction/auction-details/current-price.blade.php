<ul class="price-table mb-30">
    <li class="header">
        <h5 class="current">Current Price</h5>
        <h3 class="price">Egp {{$currentPrice}}</h3>
    </li>
    @if($auction->winner()->exists())
        <li class="header">
            <h5 class="current mt-3">The Winner</h5>
            <h3 class="text-success ">
                <img src="{{asset_website("images/dashboard/02.png")}}" alt="">
                {{$auction->winner?->name}}</h3>
        </li>
    @endif
</ul>
