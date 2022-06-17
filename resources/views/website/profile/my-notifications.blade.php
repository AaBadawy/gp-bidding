@extends("website.layout._profile-layout",['profileName' => "my Notifications","activating" => "notification"])
@section("profile-content")

    <div class="col-lg-8">
        <div class="dashboard-widget tab-content">
            <div class="alert-widget tab-pane show fade active" id="alerts">
                <ul>
                    @foreach(auth()->user()->notifications()->orderByDesc("created_at")->limit(10)->get() as $notification)
                        <livewire:website.notification :notification="$notification" />
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
