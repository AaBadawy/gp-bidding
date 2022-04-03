@extends("website.layout._profile-layout",["pageName" => "My Profile" ,"activating" => "profile"])
@section("profile-content")

    <div class="col-lg-8">
        <div class="row">
            <div class="col-12">
                <div class="dash-pro-item mb-30 dashboard-widget">
                    <div class="header">
                        <h4 class="title">Personal Details</h4>
                        <span class="edit"><i class="flaticon-edit"></i> Edit</span>
                    </div>
                    <ul class="dash-pro-body">
                        <li>
                            <div class="info-name">Name</div>
                            <div class="info-value">{{auth()->user()->name}}</div>
                        </li>
{{--                        <li>--}}
{{--                            <div class="info-name">Date of Birth</div>--}}
{{--                            <div class="info-value">15-03-1974</div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <div class="info-name">Address</div>--}}
{{--                            <div class="info-value">8198 Fieldstone Dr.La Crosse, WI 54601</div>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="dash-pro-item mb-30 dashboard-widget">
                    <div class="header">
                        <h4 class="title">Email Address</h4>
                        <span class="edit"><i class="flaticon-edit"></i> Edit</span>
                    </div>
                    <ul class="dash-pro-body">
                        <li>
                            <div class="info-name">Email</div>
                            <div class="info-value">{{auth()->user()->email}}</div>
                        </li>
                    </ul>
                </div>
            </div>
{{--            <div class="col-12">--}}
{{--                <div class="dash-pro-item dashboard-widget">--}}
{{--                    <div class="header">--}}
{{--                        <h4 class="title">Security</h4>--}}
{{--                        <span class="edit"><i class="flaticon-edit"></i> Edit</span>--}}
{{--                    </div>--}}
{{--                    <ul class="dash-pro-body">--}}
{{--                        <li>--}}
{{--                            <div class="info-name">Password</div>--}}
{{--                            <div class="info-value">xxxxxxxxxxxxxxxx</div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
