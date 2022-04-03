@extends("website.layout._profile-layout",['profileName' => "my Watching List","activating" => "watching"])
@section("profile-content")
    <!--============= Dashboard Section Starts Here =============-->
    <div class="col-lg-8">
        <div class="dash-bid-item dashboard-widget mb-40-60">
            <div class="header">
                <h4 class="title">My Auctions</h4>
                <span class="notify"><i class="flaticon-alarm"></i> My Watching List</span>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="upcoming">
                <livewire:website.profile.my-watching-list />
            </div>
        </div>
    </div>

@endsection
<!--============= Dashboard Section Ends Here =============-->
