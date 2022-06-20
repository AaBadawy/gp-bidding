@extends("website.layout._main-layout")
@section("content")
<!--============= Banner Section Starts Here =============-->
<section class="banner-section-2 bg_img" data-background="{{asset_website("images/banner/banner-bg-2.png")}}">
    <div class="container">
        <div class="row align-items-center justify-content-between align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner-content cl-white">
                    <h5 class="cate">Enjoy Exclusive</h5>
                    <h1 class="title"><span class="d-xl-block">Hot Deal</span> For You</h1>
                    <p>
                        We’re constantly bringing new properties market so keep visiting our website that you don’t miss out on the next opportunity.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 d-none d-lg-block">
                <div class="banner-thumb">
                    <img src="{{asset_website("images/banner/banner-2.png")}}" alt="banner">
                </div>
            </div>
        </div>
    </div>
    <div class="banner-shape-2 d-none d-lg-block">
        <img src="{{asset_website("/css/img/banner-shape-2.png")}}" alt="css">
    </div>
</section>
<!--============= Banner Section Ends Here =============-->


<!--============= Hightlight Slider Section Starts Here =============-->
<div class="browse-slider-section mt--140">
    <div class="container">
        <div class="section-header-2 mb-4">
            <div class="left">
                <h6 class="title cl-white cl-lg-black pl-0">Browse the highlights</h6>
            </div>
            <div class="slider-nav">
                <a href="#0" class="bro-prev"><i class="flaticon-left-arrow"></i></a>
                <a href="#0" class="bro-next active"><i class="flaticon-right-arrow"></i></a>
            </div>
        </div>
        <div class="m--15">
            <div class="browse-slider owl-theme owl-carousel">
                @foreach(\App\Entities\Category::get() as $category)
                    <a href="{{route('website.auction.index',['filter' => ['category_id' => $category->id]])}}" class="browse-item">
                        <img src="{{$category->getFirstMediaUrl('category')}}" alt="auction">
                        <span class="info">{{$category->name}}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!--============= Hightlight Slider Section Ends Here =============-->

<x-website.auction.popular-auctions :class="'feature-auction-section padding-bottom padding-top bg_img'"/>

<!--============= Upcoming Auction Section Starts Here =============-->

<section class="upcoming-auction padding-bottom">
    <div class="container">
        <div class="section-header">
            <h2 class="title">Upcoming Auctions</h2>
            <p>You are welcome to attend and join in the action at any of our upcoming auctions.</p>
        </div>
    </div>
    <div class="filter-wrapper">
        <div class="container">
            <ul class="filter">
                <li class="active">
                    <span><i class="flaticon-right-arrow"></i>All</span>
                </li>
                <li data-check=".live">
                    <span><i class="flaticon-auction"></i>Running Auction</span>
                </li>
                <li data-check=".time">
                    <span><i class="flaticon-time"></i>Future Auction</span>
                </li>
            </ul>
        </div>
    </div>
    <livewire:website.auction.index.horiz-auctions />
</section>
<!--============= Upcoming Auction Section Ends Here =============-->



<!--============= Client Section Starts Here =============-->
<section class="client-section padding-top padding-bottom">
    <div class="container">
        <div class="section-header">
            <h2 class="title">Don’t just take our word for it!</h2>
            <p>Our hard work is paying off. Great reviews from amazing customers.</p>
        </div>
        <div class="m--15">
            <div class="client-slider owl-theme owl-carousel">
                @foreach(\App\Entities\Review::query()->with(['reviewer','auction'])->limit(10)->get() as $review)
                    <div class="client-item">
                        <div class="client-content">
                            <p>{{$review->body}}</p>
                        </div>
                        <p class="mx-2 text-success">
                            Auction : <a href="{{route('website.auction.details',['auction' => $review->auction->id])}}"><span class="text-info">{{$review->auction->name}}</span><span class="fas fa-link"></span></a>
                        </p>
                        <div class="client-author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="{{ !empty($review->reviewer->getFirstMediaUrl("profile_image")) ? $review->reviewer->getFirstMediaUrl("profile_image") : asset_website("images/client/client01.png")}}" alt="client">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="#0">{{$review->reviewer->name}}</a></h6>
                                <div class="ratings">
                                    @foreach(range(0,$review->stars) as $star)
                                        <span><i class="fas fa-star"></i></span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--============= Client Section Ends Here =============-->
@endsection
