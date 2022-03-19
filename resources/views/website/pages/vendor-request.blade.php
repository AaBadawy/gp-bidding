@extends("website.layout._main-layout")
@section("content")

<!--============= Hero Section Starts Here =============-->
<div class="hero-section">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="{{route("website.main")}}">Home</a>
            </li>
            <li>
                <span>Vendor Request</span>
            </li>
        </ul>
    </div>
    <div class="bg_img hero-bg bottom_center" data-background="{{asset_website("images/banner/hero-bg.png")}}"></div>
</div>
<!--============= Hero Section Ends Here =============-->

    <!--============= Contact Section Starts Here =============-->
<section class="contact-section padding-bottom">
    <div class="container">
        <div class="contact-wrapper padding-top padding-bottom mt--100 mt-lg--440">
            <div class="section-header">
                <h5 class="cate">Be With Us</h5>
                <h2 class="title">Request Vendor Application</h2>
                <p>Love To work with heros to invest more!</p>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    @isset($success_message)
                        <div class="bg-success text-dark">
                            <p>{{$success_message}}</p>
                        </div>
                    @endisset
                    <form class="contact-form" id="contact_form" method="POST" action="{{route("website.vendor-request-store")}}">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="far fa-user"></i></label>
                            <input type="text" placeholder="Your Name" name="name" id="name" class="@error("note") border-danger @enderror" value="{{old("name")}}">
                        </div>
                        @error("name")
                            <p class="text-danger font-weight-bold pl-3">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="name"><i class="fas fa-envelope-open-text"></i></label>
                            <input type="text" placeholder="Enter Your Email ID" name="email" id="email" class="@error("note") border-danger @enderror" value="{{old("email")}}">
                        </div>
                        @error("email")
                            <p class="text-danger font-weight-bold pl-3">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="mobile"><i class="fas fa-envelope-open-text"></i></label>
                            <input type="text" placeholder="Enter Your mobile number" name="mobile" id="mobile" class="@error("note") border-danger @enderror" value="{{old("mobile")}}">
                        </div>
                        @error("mobile")
                            <p class="text-danger font-weight-bold pl-3">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="note" class="message"><i class="far fa-envelope"></i></label>
                            <textarea name="note" id="message" placeholder="Type Your Message" class="@error("note") border-danger @enderror" value="{{old("note")}}"></textarea>
                        </div>
                        @error("note")
                            <p class="text-danger font-weight-bold pl-3">{{$message}}</p>
                        @enderror
                        <div class="form-group text-center mb-0">
                            <button type="submit" class="custom-button">Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-5 d-lg-block d-none">
                    <img src="{{asset_website("images/contact.png")}}" class="w-100" alt="images">
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= Contact Section Ends Here =============-->
@endsection
