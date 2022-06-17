@extends("website.layout._registration-layout",['pageName' => "Register"])
@section("registration-content")
    <!--============= Account Section Starts Here =============-->
    <section class="account-section padding-bottom">
        <div class="container">
            <div class="account-wrapper mt--100 mt-lg--440">
                <div class="left-side">
                    <div class="section-header">
                        <h2 class="title">HI, THERE</h2>
                        <p>You can log in to your Sbidu account here.</p>
                    </div>
                    <ul class="login-with">
                        <li>
                            <a href="{{route('social.redirect')}}"><i class="fab fa-google-plus"></i>Log in with Google</a>
                        </li>
                    </ul>
                    <div class="or">
                        <span>Or</span>
                    </div>
                    <form class="login-form" method="POST" action="{{route('register')}}">
                        @csrf

                        <div class="form-group mb-30">
                            <label for="login-email"><i class="far fa-envelope"></i></label>
                            <input type="text" id="login-email" placeholder="Full Name" name="name">
                        </div>
                        @error("name")
                        <div class="mb-3 mt-1 px-5">
                            <p class="text-danger font-weight-bold my-3">{{$message}}</p>
                        </div>
                        @enderror

                        <div class="form-group mb-30">
                            <label for="login-email"><i class="far fa-envelope"></i></label>
                            <input type="text" id="login-email" placeholder="Email Address" name="email">
                        </div>
                        @error("email")
                        <div class="mb-3 mt-1 px-5">
                            <p class="text-danger font-weight-bold my-3">{{$message}}</p>
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="login-pass"><i class="fas fa-lock"></i></label>
                            <input type="password" id="login-pass" placeholder="Password" name="password">
                            <span class="pass-type"><i class="fas fa-eye"></i></span>
                        </div>
                        @error("password")
                        <div class="mb-3 mt-1 px-5">
                            <p class="text-danger font-weight-bold my-3">{{$message}}</p>
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="login-pass"><i class="fas fa-lock"></i></label>
                            <input type="password" id="login-pass" placeholder="Password Confirmation" name="password_confirmation">
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="custom-button">Register</button>
                        </div>
                    </form>
                </div>
                <div class="right-side cl-white">
                    <div class="section-header mb-0">
                        <h3 class="title mt-0">NEW HERE?</h3>
                        <p>Sign up and create your Account</p>
                        <a href="sign-up.html" class="custom-button transparent">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Account Section Ends Here =============-->

@endsection
