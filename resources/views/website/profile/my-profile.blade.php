@extends("website.layout._profile-layout",["pageName" => "My Profile" ,"activating" => "profile"])
@section("profile-content")

    <div class="col-lg-8">
        <div class="row">
            <div class="col-12">
                <livewire:website.profile.update-section :title="'Your Name'" :value="auth()->user()->name" :input="auth()->user()->name" :name="'name'" :validationRules="['name' =>['required','string']]"/>
            </div>
            <div class="col-12">
                @php
                $id = auth()->id()
                @endphp
                <livewire:website.profile.update-section :title="'Your Email'" :value="auth()->user()->email" :input="auth()->user()->email" :name="'email'" :validationRules="['name' => ['required','string','unique:users,email,$id']]"/>
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
