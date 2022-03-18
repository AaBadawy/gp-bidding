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
                        <div class="thumb-area">
                            <div class="thumb">
                                <img src="{{asset_website("images/dashboard/user.png")}}" alt="user">
                            </div>
                            <label for="profile-pic" class="profile-pic-edit"><i class="flaticon-pencil"></i></label>
                            <input type="file" id="profile-pic" class="d-none">
                        </div>
                        <div class="content">
                            <h5 class="title"><a href="#0">Percy Reed</a></h5>
                            <span class="username">john@gmail.com</span>
                        </div>
                    </div>
                    <ul class="dashboard-menu">
                        <li>
                            <a href="dashboard.html"><i class="flaticon-dashboard"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="profile.html"><i class="flaticon-settings"></i>Personal Profile </a>
                        </li>
                        <li>
                            <a href="#0" class="active"><i class="flaticon-auction"></i>My Bids</a>
                        </li>
                        <li>
                            <a href="winning-bids.html"><i class="flaticon-best-seller"></i>Winning Bids</a>
                        </li>
                        <li>
                            <a href="notifications.html"><i class="flaticon-alarm"></i>My Alerts</a>
                        </li>
                        <li>
                            <a href="my-favorites.html"><i class="flaticon-star"></i>My Favorites</a>
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
