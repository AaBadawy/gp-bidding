
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

    <!--============= Product Details Section Starts Here =============-->
    <section class="product-details padding-bottom mt--240 mt-lg--440">
        <div class="container">
            <x-website.auction.auction-details.products-images :auction="$auction" />
            <div class="row mt-40-60-80">
                <div class="col-lg-8">
                    <div class="product-details-content">
                        <div class="product-details-header">
                            <h2 class="title">{{$auction->name}}</h2>
                            <ul>
                                <li>Auction ID #: {{$auction->id}}</li>
                                <li>products' IDS #: {{$auction->products->implode("id","-")}}</li>
                            </ul>
                        </div>
                        <livewire:website.auction.auction-details.current-price :auction="$auction"/>
                        <livewire:website.auction.auction-details.bid-auction :auction="$auction"/>
                        <div class="buy-now-area">
                            <a href="#0" class="rating custom-button active border"><i class="fas fa-star"></i> Watch Auction</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-sidebar-area">
                        <div class="product-single-sidebar mb-3">
                            <h6 class="title">This Auction Ends in:</h6>
                            <div class="countdown">
                                <div id="bid_counter1" data-endDate="{{$auction->end_at->format('Y/m/d H:I')}}"></div>
                            </div>
                            <div class="side-counter-area">
                                <livewire:website.auction.auction-details.count-bidders :auction="$auction"/>
                                <livewire:website.auction.auction-details.count-watchers :auction="$auction"/>
                                <livewire:website.auction.auction-details.count-bidings :auction="$auction"/>
                            </div>
                        </div>
                        {{--        <a href="#0" class="cart-link">View Shipping, Payment & Auction Policies</a>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-menu-area mb-40-60 mt-70-100">
            <div class="container">
                <ul class="product-tab-menu nav nav-tabs">
                    <li>
                        <a href="#details" class="active" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{asset_website("/images/product/tab1.png")}}" alt="product">
                            </div>
                            <div class="content">Description</div>
                        </a>
                    </li>
                    <li>
                        <a href="#history" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{asset_website("/images/product/tab3.png")}}" alt="product">
                            </div>
                            <div class="content">Bid History ({{$auction->biddings_count}})</div>
                        </a>
                    </li>
                    <li>
                        <a href="#questions" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{asset_website("/images/product/tab4.png")}}" alt="product">
                            </div>
                            <div class="content">Questions </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="details">
                    <div class="tab-details-content">
                        <div class="header-area">
                            {!! $auction->description !!}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="history" >
                    <livewire:website.auction.auction-details.biddings-table :auction="$auction"/>
                </div>
                <div class="tab-pane fade show" id="questions">
                    <h5 class="faq-head-title">Frequently Asked Questions</h5>
                    <div class="faq-wrapper">
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{asset_website("/css/img/faq.png")}}" alt="css"><span class="title">How to start bidding?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{asset_website("/css/img/faq.png")}}" alt="css"><span class="title">Security Deposit / Bidding Power </span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{asset_website("/css/img/faq.png")}}" alt="css"><span class="title">Delivery time to the destination port </span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{asset_website("/css/img/faq.png")}}" alt="css"><span class="title">How to register to bid in an auction?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                            </div>
                        </div>
                        <div class="faq-item open active">
                            <div class="faq-title">
                                <img src="{{asset_website("/css/img/faq.png")}}" alt="css"><span class="title">How will I know if my bid was successful?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{asset_website("/css/img/faq.png")}}" alt="css"><span class="title">What happens if I bid on the wrong lot?</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--============= Product Details Section Ends Here =============-->
@endsection
