
@extends("website.layout._main-layout")

@section("content")

    <!--============= Hero Section Starts Here =============-->
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="./index.html">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>Vehicles</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset_website("/images/banner/hero-bg.png")}}"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->

<x-website.auction.popular-auctions :class="'featured-auction-section padding-bottom mt--240 mt-lg--440 pos-rel'"/>



<!--============= Product Auction Section Starts Here =============-->
<div class="product-auction padding-bottom">
    <div class="container">
        <div class="product-header mb-40">
            <div class="product-header-item">
                <div class="item">Sort By : </div>
                <select name="sort-by" class="select-bar">
                    <option value="all">Popular</option>
                    <option value="all">Future</option>
                    <option value="all">Expired</option>
                </select>
            </div>
            <div class="product-header-item">
                <div class="item">Show : </div>
                <select name="sort-by" class="select-bar">
                    <option value="09">09</option>
                    <option value="21">21</option>
                    <option value="30">30</option>
                    <option value="39">39</option>
                    <option value="60">60</option>
                </select>
            </div>
            <form class="product-search ml-auto">
                <input type="text" placeholder="Item Name">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="row mb-30-none justify-content-center">
            @foreach($auctions as $auction)
                <livewire:website.auction.auction-item :auction="$auction" />
            @endforeach
        </div>
        <ul class="pagination">
            <li>
                <a href="{{ $auctions->previousPageUrl() }}"><i class="{{ $auctions->onFirstPage() ? ' disabled' : '' }} flaticon-left-arrow"></i></a>
            </li>
            @for ($i = 1; $i <= $auctions->lastPage(); $i++)
                <li>
                    <a href="{{ $auctions->url($i) }}" @class([ ($auctions->currentPage() == $i) => 'active'])>{{ $i }}</a>
                </li>
            @endfor
            <li>
                <a href="{{ $auctions->nextPageUrl() }}"><i class="flaticon-right-arrow"></i></a>
            </li>
        </ul>
    </div>
</div>
<!--============= Product Auction Section Ends Here =============-->
@endsection
