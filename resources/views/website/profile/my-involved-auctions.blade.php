@extends("website.layout._profile-layout",['profileName' => "my Bids","activating" => "involved-auctions"])
@section("profile-content")
<!--============= Dashboard Section Starts Here =============-->
<div class="col-lg-8">
    <div class="dash-bid-item dashboard-widget mb-40-60">
        <div class="header">
            <h4 class="title">My Auctions</h4>
            <span class="notify"><i class="flaticon-alarm"></i> Manage Notifications</span>
        </div>
        <ul class="button-area nav nav-tabs">
            <livewire:website.profile.involved-auctions.change-status :status="'running'" />
            <livewire:website.profile.involved-auctions.change-status :status="'past'" />
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="upcoming">
            <livewire:website.profile.involved-auctions />
        </div>
    </div>
</div>

@endsection
<!--============= Dashboard Section Ends Here =============-->
