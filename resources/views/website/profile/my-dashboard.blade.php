@extends("website.layout._profile-layout",['activating' => 'dashboard' , 'profileName' => 'my dashboard'])
@section("profile-content")

    <div class="col-lg-8">
        <div class="dashboard-widget mb-40">
            <div class="dashboard-title mb-30">
                <h5 class="title">My Activity</h5>
            </div>
            <div class="row justify-content-center mb-30-none">
                <x-website.profile.dashboard.active-involved-auctions :imagePath="'images/dashboard/01.png'" :/>

                <x-website.profile.dashboard.won-auctions :imagePath="'images/dashboard/02.png'" :/>

                <x-website.profile.dashboard.noticable-auctions :imagePath="'images/dashboard/03.png'" :/>

            </div>
        </div>
        <livewire:website.profile.dashboard.my-bids-log />
    </div>
@endsection
