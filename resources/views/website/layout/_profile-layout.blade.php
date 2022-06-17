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
                    <a href="#0">My Account</a>
                </li>
                <li>
                    <span>{{$profileName ?? ""}}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset_website("images/banner/hero-bg.png")}}"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->

    <section class="dashboard-section padding-bottom mt--240 mt-lg--440 pos-rel">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-7 col-lg-4">
                <div class="dashboard-widget mb-30 mb-lg-0 sticky-menu">
                    <div class="user">
                        <livewire:website.profile.save-profile-image />
                        <div class="content">
                            <h5 class="title"><a href="#0">{{auth()->user()->name}}</a></h5>
                            <span class="username">{{auth()->user()->email}}</span>
                        </div>
                    </div>
                    <ul class="dashboard-menu">
                        <li>
                            <a href="{{route("website.profile.my-dashboard")}}" @class(['active' => $activating == 'dashboard'])><i class="flaticon-dashboard"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{route("website.profile.my-profile")}}" @class(['active' => $activating == 'profile'])><i class="flaticon-settings"></i>Personal Profile </a>
                        </li>
                        <li>
                            <a href="{{route("website.profile.my-involved-auctions")}}" @class([ 'active' => $activating == 'involved-auctions'])><i class="flaticon-auction"></i>Involved Auctions</a>
                        </li>
                        <li>
                            <a href="winning-bids.html @class([ 'active' => $activating == 'winning-bids'])"><i class="flaticon-best-seller"></i>Winning Bids</a>
                        </li>
                        <li>
                            <a href="{{route('website.profile.my-notifications')}}" @class(['active' => $activating == 'notification'])><i class="flaticon-alarm"></i>My Alerts</a>
                        </li>
                        <li>
                            <a href="{{route("website.profile.my-watching-list")}}" @class(['active' => $activating == 'watching'])><i class="flaticon-star"></i>Watching Bids</a>
                        </li>
                        <li>
                            <a href="{{route("website.profile.my-chats")}}" @class(['active' => $activating == 'chat'])><i class="flaticon-arrows"></i>My Messages</a>
                        </li>
                        <li>
                            <a href="{{route("logout")}}"><i class="flaticon-logout"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            @yield("profile-content")
        </div>
    </div>
</section>
@endsection
