<header>
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <ul class="customer-support">
                    <li>
                        <a href="#0" class="mr-3"><i class="fas fa-phone-alt"></i><span class="ml-2 d-none d-sm-inline-block">Customer Support</span></a>
                    </li>
                </ul>
                <ul class="cart-button-area">
                    <livewire:website.watching.counter />
                    <li>
                        <a href="{{route("website.profile.my-profile")}}" class="user-button"><i class="flaticon-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{route("website.main")}}">
                        <img src="{{asset_website("images/gp-logo.png")}}" alt="logo">
                    </a>
                </div>
                <ul class="menu ml-auto">
                    <li>
                        <a href="{{route("website.main")}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route("website.auction.index")}}">Auction</a>
                    </li>
                    @if(auth()->check() && auth()->user()->isClient())
                        <li>
                            <a href="{{route("website.vendor-request-page")}}">Work With Us</a>
                        </li>
                    @endif
                    @if(auth()->check() && (auth()->user()->isAdmin() || auth()->user()->isVendor()))
                    <li>
                        <a href="{{route('dashboard.dashboard')}}">Dashboard</a>
                    </li>
                    @endif
                </ul>
                <form class="search-form white" method="GET" action="{{route('website.auction.index')}}">
                    <input type="text" placeholder="Search for auctions name....." name="filter[name]">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
{{--                <div class="search-bar d-md-none">--}}
{{--                    <a href=""><i class="fas fa-search"></i></a>--}}
{{--                </div>--}}
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>
