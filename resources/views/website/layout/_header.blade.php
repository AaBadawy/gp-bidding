<header>
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <ul class="customer-support">
                    <li>
                        <a href="#0" class="mr-3"><i class="fas fa-phone-alt"></i><span class="ml-2 d-none d-sm-inline-block">Customer Support</span></a>
                    </li>
                    <li>
                        <i class="fas fa-globe"></i>
                        <select name="language" class="select-bar">
                            <option value="en">En</option>
                            <option value="ar">Ar</option>
                        </select>
                    </li>
                </ul>
                <ul class="cart-button-area">
                    <li>
                        <a href="#0" class="cart-button"><i class="flaticon-shopping-basket"></i><span class="amount">08</span></a>
                    </li>
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
                        <img src="{{asset_website("images/logo/logo.png")}}" alt="logo">
                    </a>
                </div>
                <ul class="menu ml-auto">
                    <li>
                        <a href="{{route("website.main")}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route("website.auction.index")}}">Auction</a>
                    </li>
                    <li>
                        <a href="{{route("website.vendor-request-page")}}">Work With Us</a>
                    </li>
                </ul>
                <form class="search-form white">
                    <input type="text" placeholder="Search for brand, model....">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <div class="search-bar d-md-none">
                    <a href="#0"><i class="fas fa-search"></i></a>
                </div>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>
