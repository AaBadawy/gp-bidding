<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Sbidu - Bid And Auction HTML Template</title>

    <link rel="stylesheet" href="{{asset_website("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset_website("css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset_website("css/animate.css")}}">
    <link rel="stylesheet" href="{{asset_website("css/nice-select.css")}}">
    <link rel="stylesheet" href="{{asset_website("css/owl.min.css")}}">
    <link rel="stylesheet" href="{{asset_website("css/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{asset_website("css/flaticon.css")}}">
    <link rel="stylesheet" href="{{asset_website("css/jquery-ui.min.css")}}">
    <link rel="stylesheet" href="{{asset_website("css/main.css")}}">

    <link rel="shortcut icon" href="{{asset_website("images/favicon.png")}}" type="image/x-icon">
</head>

<body>
<!--============= ScrollToTop Section Starts Here =============-->
<div class="overlayer" id="overlayer">
    <div class="loader">
        <div class="loader-inner"></div>
    </div>
</div>
<a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
<div class="overlay"></div>
<!--============= ScrollToTop Section Ends Here =============-->


<!--============= Header Section Starts Here =============-->
@include('website.layout._header')
<!--============= Header Section Ends Here =============-->

<!--============= Cart Section Starts Here =============-->
<div class="cart-sidebar-area">
    <div class="top-content">
        <a href="index.html" class="logo">
            <img src={{asset_website("images/logo/logo2.png")}} alt="logo">
        </a>
        <span class="side-sidebar-close-btn"><i class="fas fa-times"></i></span>
    </div>
    <div class="bottom-content">
        <div class="cart-products">
            <h4 class="title">Shopping cart</h4>
            <div class="single-product-item">
                <div class="thumb">
                    <a href="#0"><img src={{asset_website("images/shop/shop01.jpg")}} alt="shop"></a>
                </div>
                <div class="content">
                    <h4 class="title"><a href="#0">Color Pencil</a></h4>
                    <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                    <a href="#" class="remove-cart">Remove</a>
                </div>
            </div>
            <div class="single-product-item">
                <div class="thumb">
                    <a href="#0"><img src={{asset_website("images/shop/shop02.jpg")}} alt="shop"></a>
                </div>
                <div class="content">
                    <h4 class="title"><a href="#0">Water Pot</a></h4>
                    <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                    <a href="#" class="remove-cart">Remove</a>
                </div>
            </div>
            <div class="single-product-item">
                <div class="thumb">
                    <a href="#0"><img src={{asset_website("images/shop/shop03.jpg")}} alt="shop"></a>
                </div>
                <div class="content">
                    <h4 class="title"><a href="#0">Art Paper</a></h4>
                    <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                    <a href="#" class="remove-cart">Remove</a>
                </div>
            </div>
            <div class="single-product-item">
                <div class="thumb">
                    <a href="#0"><img src={{asset_website("images/shop/shop04.jpg")}} alt="shop"></a>
                </div>
                <div class="content">
                    <h4 class="title"><a href="#0">Stop Watch</a></h4>
                    <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                    <a href="#" class="remove-cart">Remove</a>
                </div>
            </div>
            <div class="single-product-item">
                <div class="thumb">
                    <a href="#0"><img src={{asset_website("images/shop/shop05.jpg")}} alt="shop"></a>
                </div>
                <div class="content">
                    <h4 class="title"><a href="#0">Comics Book</a></h4>
                    <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                    <a href="#" class="remove-cart">Remove</a>
                </div>
            </div>
            <div class="btn-wrapper text-center">
                <a href="#0" class="custom-button"><span>Checkout</span></a>
            </div>
        </div>
    </div>
</div>
<!--============= Cart Section Ends Here =============-->


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
                    <a href="#0" class="custom-button yellow btn-large">Get Started</a>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 d-none d-lg-block">
                <div class="banner-thumb">
                    <img src={{asset_website("images/banner/banner-2.png")}} alt="banner">
                </div>
            </div>
        </div>
    </div>
    <div class="banner-shape-2 d-none d-lg-block">
        <img src={{asset_website("/css/img/banner-shape-2.png")}} alt="css">
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
                <a href="#0" class="browse-item">
                    <img src={{asset_website("images/auction/01.png")}} alt="auction">
                    <span class="info">Vehicles</span>
                </a>
                <a href="#0" class="browse-item">
                    <img src={{asset_website("images/auction/02.png")}} alt="auction">
                    <span class="info">Jewelry</span>
                </a>
                <a href="#0" class="browse-item">
                    <img src="{{asset_website("images/auction/03.png")}}" alt="auction">
                    <span class="info">Watches</span>
                </a>
                <a href="#0" class="browse-item">
                    <img src={{asset_website("images/auction/04.png")}} alt="auction">
                    <span class="info">Electronics</span>
                </a>
                <a href="#0" class="browse-item">
                    <img src={{asset_website("images/auction/05.png")}} alt="auction">
                    <span class="info">Sports</span>
                </a>
                <a href="#0" class="browse-item">
                    <img src={{asset_website("images/auction/06.png")}} alt="auction">
                    <span class="info">Real Estate</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!--============= Hightlight Slider Section Ends Here =============-->


<!--============= Feture Auction Section Starts Here =============-->
<section class="feature-auction-section padding-bottom padding-top bg_img" data-background="./assets/images/auction/featured/featured-bg-1.jpg")}}>
    <div class="container">
        <div class="section-header">
            <h2 class="title">Featured Items</h2>
            <p>Bid and win great deals,Our auction process is simple, efficient, and transparent.</p>
        </div>
        <div class="row justify-content-center mb-30-none">
            @foreach(range(1,4) as $index)
                <livewire:website.auction.auction-item />
            @endforeach
        </div>
        <div class="load-wrapper">
            <a href="#0" class="normal-button">See All Auction</a>
        </div>
    </div>
</section>
<!--============= Feture Auction Section Ends Here =============-->


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
                <li class="active" data-check="*">
                    <span><i class="flaticon-right-arrow"></i>All</span>
                </li>
                <li data-check=".live">
                    <span><i class="flaticon-auction"></i>Live Auction</span>
                </li>
                <li data-check=".time">
                    <span><i class="flaticon-time"></i>Time Auction</span>
                </li>
                <li data-check=".buy">
                    <span><i class="flaticon-bag"></i>buy now</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="m--15">
            <div class="auction-wrapper-5">
                <div class="auction-item-5 time">
                    <div class="auction-inner">
                        <div class="upcoming-badge" title="Upcoming Auction">
                            <i class="flaticon-auction"></i>
                        </div>
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src={{asset_website("images/auction/upcoming/upcoming-1.png")}} alt="upcoming"></a>
                            <a href="./product-details.html" class="rating"><i class="far fa-star"></i></a>
                        </div>
                        <div class="auction-content">
                            <div class="title-area">
                                <h6 class="title">
                                    <a href="#0">Apple Macbook Pro Laptop</a>
                                </h6>
                                <div class="list-area">
                                        <span class="list-item">
                                            <span class="list-id">Listing ID</span>14033488
                                        </span>
                                    <span class="list-item">
                                            <span class="list-id">Item #</span>0900-027867
                                        </span>
                                </div>
                            </div>
                            <div class="bid-area">
                                <div class="bid-inner">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">$5,00.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-count-area">
                                    <span class="item">
                                        <span class="left">Total Bids</span>97 Bids
                                    </span>
                                <span class="item">
                                        <span class="left">Last Bid </span>7 mins ago
                                    </span>
                            </div>
                        </div>
                        <div class="auction-bidding">
                            <span class="bid-title">Bidding ends in</span>
                            <div class="countdown">
                                <div id="bid_counter3"></div>
                            </div>
                            <div class="bid-incr">
                                <span class="title">Bid Increment</span>
                                <h4>$3</h4>
                            </div>
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-5 live">
                    <div class="auction-inner">
                        <div class="upcoming-badge" title="Upcoming Auction">
                            <i class="flaticon-auction"></i>
                        </div>
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src={{asset_website("images/auction/upcoming/upcoming-2.png")}} alt="upcoming"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                        </div>
                        <div class="auction-content">
                            <div class="title-area">
                                <h6 class="title">
                                    <a href="./product-details.html">14k Gold Geneve Watch,24.5g</a>
                                </h6>
                                <div class="list-area">
                                        <span class="list-item">
                                            <span class="list-id">Listing ID</span>14033488
                                        </span>
                                    <span class="list-item">
                                            <span class="list-id">Item #</span>0900-027867
                                        </span>
                                </div>
                            </div>
                            <div class="bid-area">
                                <div class="bid-inner">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">$5,00.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-count-area">
                                    <span class="item">
                                        <span class="left">Total Bids</span>97 Bids
                                    </span>
                                <span class="item">
                                        <span class="left">Last Bid </span>7 mins ago
                                    </span>
                            </div>
                        </div>
                        <div class="auction-bidding">
                            <span class="bid-title">Bidding ends in</span>
                            <div class="countdown">
                                <div id="bid_counter4"></div>
                            </div>
                            <div class="bid-incr">
                                <span class="title">Bid Increment</span>
                                <h4>$3</h4>
                            </div>
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-5 buy">
                    <div class="auction-inner">
                        <div class="upcoming-badge" title="Upcoming Auction">
                            <i class="flaticon-auction"></i>
                        </div>
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src={{asset_website("images/auction/upcoming/upcoming-3.png")}} alt="upcoming"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                        </div>
                        <div class="auction-content">
                            <div class="title-area">
                                <h6 class="title">
                                    <a href="./product-details.html">2009 Toyota Prius (Medford, NY 11763)</a>
                                </h6>
                                <div class="list-area">
                                        <span class="list-item">
                                            <span class="list-id">Listing ID</span>14033488
                                        </span>
                                    <span class="list-item">
                                            <span class="list-id">Item #</span>0900-027867
                                        </span>
                                </div>
                            </div>
                            <div class="bid-area">
                                <div class="bid-inner">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">$5,00.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-count-area">
                                    <span class="item">
                                        <span class="left">Total Bids</span>97 Bids
                                    </span>
                                <span class="item">
                                        <span class="left">Last Bid </span>7 mins ago
                                    </span>
                            </div>
                        </div>
                        <div class="auction-bidding">
                            <span class="bid-title">Bidding ends in</span>
                            <div class="countdown">
                                <div id="bid_counter5"></div>
                            </div>
                            <div class="bid-incr">
                                <span class="title">Bid Increment</span>
                                <h4>$3</h4>
                            </div>
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-5 time">
                    <div class="auction-inner">
                        <div class="upcoming-badge" title="Upcoming Auction">
                            <i class="flaticon-auction"></i>
                        </div>
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src={{asset_website("images/auction/upcoming/upcoming-4.png")}} alt="upcoming"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                        </div>
                        <div class="auction-content">
                            <div class="title-area">
                                <h6 class="title">
                                    <a href="./product-details.html">Canon EOS Rebel T6I Digital Camera</a>
                                </h6>
                                <div class="list-area">
                                        <span class="list-item">
                                            <span class="list-id">Listing ID</span>14033488
                                        </span>
                                    <span class="list-item">
                                            <span class="list-id">Item #</span>0900-027867
                                        </span>
                                </div>
                            </div>
                            <div class="bid-area">
                                <div class="bid-inner">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">$5,00.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-count-area">
                                    <span class="item">
                                        <span class="left">Total Bids</span>97 Bids
                                    </span>
                                <span class="item">
                                        <span class="left">Last Bid </span>7 mins ago
                                    </span>
                            </div>
                        </div>
                        <div class="auction-bidding">
                            <span class="bid-title">Bidding ends in</span>
                            <div class="countdown">
                                <div id="bid_counter6"></div>
                            </div>
                            <div class="bid-incr">
                                <span class="title">Bid Increment</span>
                                <h4>$3</h4>
                            </div>
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-5 buy">
                    <div class="auction-inner">
                        <div class="upcoming-badge" title="Upcoming Auction">
                            <i class="flaticon-auction"></i>
                        </div>
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src={{asset_website("images/auction/upcoming/upcoming-5.png")}} alt="upcoming"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                        </div>
                        <div class="auction-content">
                            <div class="title-area">
                                <h6 class="title">
                                    <a href="./product-details.html">14K White Gold 185.60 Grams 5.95 Carats.....</a>
                                </h6>
                                <div class="list-area">
                                        <span class="list-item">
                                            <span class="list-id">Listing ID</span>14033488
                                        </span>
                                    <span class="list-item">
                                            <span class="list-id">Item #</span>0900-027867
                                        </span>
                                </div>
                            </div>
                            <div class="bid-area">
                                <div class="bid-inner">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">$5,00.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-count-area">
                                    <span class="item">
                                        <span class="left">Total Bids</span>97 Bids
                                    </span>
                                <span class="item">
                                        <span class="left">Last Bid </span>7 mins ago
                                    </span>
                            </div>
                        </div>
                        <div class="auction-bidding">
                            <span class="bid-title">Bidding ends in</span>
                            <div class="countdown">
                                <div id="bid_counter7"></div>
                            </div>
                            <div class="bid-incr">
                                <span class="title">Bid Increment</span>
                                <h4>$3</h4>
                            </div>
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-5 live">
                    <div class="auction-inner">
                        <div class="upcoming-badge" title="Upcoming Auction">
                            <i class="flaticon-auction"></i>
                        </div>
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src={{asset_website("images/auction/upcoming/upcoming-6.png")}} alt="upcoming"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                        </div>
                        <div class="auction-content">
                            <div class="title-area">
                                <h6 class="title">
                                    <a href="./product-details.html">.6 Gram Pure Gold Nugget</a>
                                </h6>
                                <div class="list-area">
                                        <span class="list-item">
                                            <span class="list-id">Listing ID</span>14033488
                                        </span>
                                    <span class="list-item">
                                            <span class="list-id">Item #</span>0900-027867
                                        </span>
                                </div>
                            </div>
                            <div class="bid-area">
                                <div class="bid-inner">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">$5,00.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-count-area">
                                    <span class="item">
                                        <span class="left">Total Bids</span>97 Bids
                                    </span>
                                <span class="item">
                                        <span class="left">Last Bid </span>7 mins ago
                                    </span>
                            </div>
                        </div>
                        <div class="auction-bidding">
                            <span class="bid-title">Bidding ends in</span>
                            <div class="countdown">
                                <div id="bid_counter8"></div>
                            </div>
                            <div class="bid-incr">
                                <span class="title">Bid Increment</span>
                                <h4>$3</h4>
                            </div>
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-5 time">
                    <div class="auction-inner">
                        <div class="upcoming-badge" title="Upcoming Auction">
                            <i class="flaticon-auction"></i>
                        </div>
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src={{asset_website("images/auction/upcoming/upcoming-7.png")}} alt="upcoming"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                        </div>
                        <div class="auction-content">
                            <div class="title-area">
                                <h6 class="title">
                                    <a href="./product-details.html">Magnifying Glasses, Jewelry Loupe...</a>
                                </h6>
                                <div class="list-area">
                                        <span class="list-item">
                                            <span class="list-id">Listing ID</span>14033488
                                        </span>
                                    <span class="list-item">
                                            <span class="list-id">Item #</span>0900-027867
                                        </span>
                                </div>
                            </div>
                            <div class="bid-area">
                                <div class="bid-inner">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">$5,00.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-count-area">
                                    <span class="item">
                                        <span class="left">Total Bids</span>97 Bids
                                    </span>
                                <span class="item">
                                        <span class="left">Last Bid </span>7 mins ago
                                    </span>
                            </div>
                        </div>
                        <div class="auction-bidding">
                            <span class="bid-title">Bidding ends in</span>
                            <div class="countdown">
                                <div id="bid_counter9"></div>
                            </div>
                            <div class="bid-incr">
                                <span class="title">Bid Increment</span>
                                <h4>$3</h4>
                            </div>
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
                <div class="auction-item-5 live">
                    <div class="auction-inner">
                        <div class="upcoming-badge" title="Upcoming Auction">
                            <i class="flaticon-auction"></i>
                        </div>
                        <div class="auction-thumb">
                            <a href="./product-details.html"><img src={{asset_website("images/auction/upcoming/upcoming-8.png")}} alt="upcoming"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                        </div>
                        <div class="auction-content">
                            <div class="title-area">
                                <h6 class="title">
                                    <a href="./product-details.html">"Small Primitive Shell" Glass Sculpture</a>
                                </h6>
                                <div class="list-area">
                                        <span class="list-item">
                                            <span class="list-id">Listing ID</span>14033488
                                        </span>
                                    <span class="list-item">
                                            <span class="list-id">Item #</span>0900-027867
                                        </span>
                                </div>
                            </div>
                            <div class="bid-area">
                                <div class="bid-inner">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Current Bid</div>
                                            <div class="amount">$876.00</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Buy Now</div>
                                            <div class="amount">$5,00.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bid-count-area">
                                    <span class="item">
                                        <span class="left">Total Bids</span>97 Bids
                                    </span>
                                <span class="item">
                                        <span class="left">Last Bid </span>7 mins ago
                                    </span>
                            </div>
                        </div>
                        <div class="auction-bidding">
                            <span class="bid-title">Bidding ends in</span>
                            <div class="countdown">
                                <div id="bid_counter10"></div>
                            </div>
                            <div class="bid-incr">
                                <span class="title">Bid Increment</span>
                                <h4>$3</h4>
                            </div>
                            <a href="#0" class="custom-button">Submit a bid</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= Upcoming Auction Section Ends Here =============-->


<!--============= How Section Starts Here =============-->
<section class="how-video-section pos-rel">
    <div class="popular-bg bg_img" data-background="./assets/images/auction/popular/popular-bg.png")}}></div>
    <div class="how-video-shape bg_img d-none d-md-block" data-background="./assets/css/img/how-video.png")}}></div>
    <div class="container">
        <div class="how-video-wrapper">
            <div class="how-video-area">
                <a href="https://www.youtube.com/watch?v=Mj3QejzYZ70" class="popup">
                    <h5 class="title">Watch Our Videos</h5>
                    <div class="video-button">
                        <i class="flaticon-right-arrow-1"></i>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <div class="how-wrapper section-bg shadow-style">
            <div class="section-header text-lg-left">
                <h2 class="title">How it works</h2>
                <p>Easy 3 steps to win</p>
            </div>
            <div class="row justify-content-center mb--40">
                <div class="col-md-6 col-lg-4">
                    <div class="how-item">
                        <div class="how-thumb">
                            <img src={{asset_website("images/how/how1.png")}} alt="how">
                        </div>
                        <div class="how-content">
                            <h4 class="title">Sign Up</h4>
                            <p>No Credit Card Required</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="how-item">
                        <div class="how-thumb">
                            <img src={{asset_website("images/how/how2.png")}} alt="how">
                        </div>
                        <div class="how-content">
                            <h4 class="title">Bid</h4>
                            <p>Bidding is free Only pay if you win</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="how-item">
                        <div class="how-thumb">
                            <img src={{asset_website("images/how/how3.png")}} alt="how">
                        </div>
                        <div class="how-content">
                            <h4 class="title">Win</h4>
                            <p>Fun - Excitement - Great deals</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= How Section Ends Here =============-->


<!--============= Call In Section Starts Here =============-->
<section class="call-in-section padding-top">
    <div class="container">
        <div class="call-wrapper cl-white bg_img" data-background="./assets/images/call-in/call-bg.png")}}>
            <div class="section-header">
                <h3 class="title">Register for Free & Start Bidding Now!</h3>
                <p>From cars to diamonds to iPhones, we have it all.</p>
            </div>
            <a href="sign-up.html" class="custom-button white">Register</a>
        </div>
    </div>
</section>
<!--============= Call In Section Ends Here =============-->


<!--============= Client Section Starts Here =============-->
<section class="client-section padding-top padding-bottom">
    <div class="container">
        <div class="section-header">
            <h2 class="title">Don’t just take our word for it!</h2>
            <p>Our hard work is paying off. Great reviews from amazing customers.</p>
        </div>
        <div class="m--15">
            <div class="client-slider owl-theme owl-carousel">
                <div class="client-item">
                    <div class="client-content">
                        <p>I can't stop bidding! It's a great way to spend some time and I want everything on Sbidu.</p>
                    </div>
                    <div class="client-author">
                        <div class="thumb">
                            <a href="#0">
                                <img src={{asset_website("images/client/client01.png")}} alt="client">
                            </a>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="#0">Alexis Moore</a></h6>
                            <div class="ratings">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="client-item">
                    <div class="client-content">
                        <p>I came I saw I won. Love what I have won, and will try to win something else.</p>
                    </div>
                    <div class="client-author">
                        <div class="thumb">
                            <a href="#0">
                                <img src={{asset_website("images/client/client02.png")}} alt="client">
                            </a>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="#0">Darin Griffin</a></h6>
                            <div class="ratings">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="client-item">
                    <div class="client-content">
                        <p>This was my first time, but it was exciting. I will try it again. Thank you so much.</p>
                    </div>
                    <div class="client-author">
                        <div class="thumb">
                            <a href="#0">
                                <img src={{asset_website("images/client/client03.png")}} alt="client">
                            </a>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="#0">Tom Powell</a></h6>
                            <div class="ratings">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= Client Section Ends Here =============-->


<!--============= Footer Section Starts Here =============-->
<footer class="bg_img padding-top oh" data-background="./assets/images/footer/footer-bg.jpg")}}>
    <div class="footer-top-shape">
        <img src={{asset_website("/css/img/footer-top-shape.png")}} alt="css">
    </div>
    <div class="anime-wrapper">
        <div class="anime-1 plus-anime">
            <img src={{asset_website("images/footer/p1.png")}} alt="footer">
        </div>
        <div class="anime-2 plus-anime">
            <img src={{asset_website("images/footer/p2.png")}} alt="footer">
        </div>
        <div class="anime-3 plus-anime">
            <img src={{asset_website("images/footer/p3.png")}} alt="footer">
        </div>
        <div class="anime-5 zigzag">
            <img src={{asset_website("images/footer/c2.png")}} alt="footer">
        </div>
        <div class="anime-6 zigzag">
            <img src={{asset_website("images/footer/c3.png")}} alt="footer">
        </div>
        <div class="anime-7 zigzag">
            <img src={{asset_website("images/footer/c4.png")}} alt="footer">
        </div>
    </div>
    <div class="newslater-wrapper">
        <div class="container">
            <div class="newslater-area">
                <div class="newslater-thumb">
                    <img src={{asset_website("images/footer/newslater.png")}} alt="footer">
                </div>
                <div class="newslater-content">
                    <div class="section-header left-style mb-low">
                        <h5 class="cate">Subscribe to Sbidu</h5>
                        <h3 class="title">To Get Exclusive Benefits</h3>
                    </div>
                    <form class="subscribe-form">
                        <input type="text" placeholder="Enter Your Email" name="email">
                        <button type="submit" class="custom-button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top padding-bottom padding-top">
        <div class="container">
            <div class="row mb--60">
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-widget widget-links">
                        <h5 class="title">Auction Categories</h5>
                        <ul class="links-list">
                            <li>
                                <a href="#0">Ending Now</a>
                            </li>
                            <li>
                                <a href="#0">Vehicles</a>
                            </li>
                            <li>
                                <a href="#0">Watches</a>
                            </li>
                            <li>
                                <a href="#0">Electronics</a>
                            </li>
                            <li>
                                <a href="#0">Real Estate</a>
                            </li>
                            <li>
                                <a href="#0">Jewelry</a>
                            </li>
                            <li>
                                <a href="#0">Art</a>
                            </li>
                            <li>
                                <a href="#0">Sports & Outdoor</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-widget widget-links">
                        <h5 class="title">About Us</h5>
                        <ul class="links-list">
                            <li>
                                <a href="#0">About Sbidu</a>
                            </li>
                            <li>
                                <a href="#0">Help</a>
                            </li>
                            <li>
                                <a href="#0">Affiliates</a>
                            </li>
                            <li>
                                <a href="#0">Jobs</a>
                            </li>
                            <li>
                                <a href="#0">Press</a>
                            </li>
                            <li>
                                <a href="#0">Our blog</a>
                            </li>
                            <li>
                                <a href="#0">Collectors' portal</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-widget widget-links">
                        <h5 class="title">We're Here to Help</h5>
                        <ul class="links-list">
                            <li>
                                <a href="#0">Your Account</a>
                            </li>
                            <li>
                                <a href="#0">Safe and Secure</a>
                            </li>
                            <li>
                                <a href="#0">Shipping Information</a>
                            </li>
                            <li>
                                <a href="#0">Contact Us</a>
                            </li>
                            <li>
                                <a href="#0">Help & FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-widget widget-follow">
                        <h5 class="title">Follow Us</h5>
                        <ul class="links-list">
                            <li>
                                <a href="#0"><i class="fas fa-phone-alt"></i>(646) 663-4575</a>
                            </li>
                            <li>
                                <a href="#0"><i class="fas fa-blender-phone"></i>(646) 968-0608</a>
                            </li>
                            <li>
                                <a href="#0"><i class="fas fa-envelope-open-text"></i>help@engotheme.com</a>
                            </li>
                            <li>
                                <a href="#0"><i class="fas fa-location-arrow"></i>1201 Broadway Suite</a>
                            </li>
                        </ul>
                        <ul class="social-icons">
                            <li>
                                <a href="#0" class="active"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright-area">
                <div class="footer-bottom-wrapper">
                    <div class="logo">
                        <a href="index.html"><img src={{asset_website("images/logo/footer-logo.png")}} alt="logo"></a>
                    </div>
                    <ul class="gateway-area">
                        <li>
                            <a href="#0"><img src={{asset_website("images/footer/paypal.png")}} alt="footer"></a>
                        </li>
                        <li>
                            <a href="#0"><img src={{asset_website("images/footer/visa.png")}} alt="footer"></a>
                        </li>
                        <li>
                            <a href="#0"><img src={{asset_website("images/footer/discover.png")}} alt="footer"></a>
                        </li>
                        <li>
                            <a href="#0"><img src={{asset_website("images/footer/mastercard.png")}} alt="footer"></a>
                        </li>
                    </ul>
                    <div class="copyright"><p>&copy; Copyright 2021 | <a href="#0">Sbidu</a> By <a href="#0">Uiaxis</a></p></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--============= Footer Section Ends Here =============-->



<script src={{asset_website("js/jquery-3.3.1.min.js")}}></script>
<script src={{asset_website("js/modernizr-3.6.0.min.js")}}></script>
<script src={{asset_website("js/plugins.js")}}></script>
<script src={{asset_website("js/bootstrap.min.js")}}></script>
<script src={{asset_website("js/isotope.pkgd.min.js")}}></script>
<script src={{asset_website("js/wow.min.js")}}></script>
<script src={{asset_website("js/waypoints.js")}}></script>
<script src={{asset_website("js/nice-select.js")}}></script>
<script src={{asset_website("js/counterup.min.js")}}></script>
<script src={{asset_website("js/owl.min.js")}}></script>
<script src={{asset_website("js/magnific-popup.min.js")}}></script>
<script src={{asset_website("js/yscountdown.min.js")}}></script>
<script src={{asset_website("js/jquery-ui.min.js")}}></script>
<script src={{asset_website("js/main.js")}}></script>
</body>

</html>
