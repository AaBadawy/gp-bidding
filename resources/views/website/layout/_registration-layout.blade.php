@extends("website.layout._main-layout")
@section("content")
    <!--============= Hero Section Starts Here =============-->
    <div class="hero-section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="./index.html">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>{{$pageName}}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset_website("images/banner/hero-bg.png")}}"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->

    @yield("registration-content")
@endsection
