<div class="flex-row-auto offcanvas-mobile w-30px w-xl-350px col-xxl-3" id="kt_profile_aside">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <!--begin::Body-->
        @if(is_null($lastBidder))
            <div class="card-body pt-4">
                No Involved Clients Yet
            </div>
        @else
            <div class="card-body pt-4">
                <!--begin::Toolbar-->
                <h4 @class(['m-3', 'text-muted' => ! $isWinner,'text-dark font-weigh-bold' => $isWinner])>{{$isWinner ? 'The Winner' : 'Last bidder'}} <i @class(['fas fa-star text-warning' => $isWinner])></i></h4>
                <hr>
                <!--end::Toolbar-->
                <!--begin::User-->
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                        <div class="symbol-label" style="background-image:url({{asset_metronic('media/users/300_13.jpg')}})"></div>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    <div>
                        <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{$lastBidder?->name}}</a>
                        {{--                    <div class="text-muted">Application Developer</div>--}}
                        <div class="mt-2">
                            <a href="{{route("dashboard.my-chats",['directTo' => $lastBidder->id])}}" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Chat</a>
                            <livewire:block-client :client="$lastBidder"/>
{{--                            <a href="#" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1" wire:click="block">Block</a>--}}
                        </div>
                    </div>
                </div>
                <!--end::User-->
                <!--begin::Contact-->
                <div class="pt-8 pb-6">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Email:</span>
                        <a href="#" class="text-muted text-hover-primary">{{$lastBidder?->email}}</a>
                    </div>
                </div>
                <!--end::Contact-->
                <!--begin::Contact-->
                <!--end::Contact-->
                <a href="#" class="btn btn-light-success font-weight-bold py-3 px-6 mb-2 text-center btn-block">Profile Overview</a>
            </div>
        @endif
        <!--end::Body-->
    </div>
    @if(auth()->user()->isAdmin() && $auction?->vendor?->owner()->exists())
        <div class="card card-custom gutter-b">
            <div class="card-body pt-4">
                <a href="{{route('dashboard.users.show',['user_type' => 'vendor','user' => $auction?->vendor->owner->id])}}">see the vendor owner</a>
            </div>
        </div>
    @endif
    <!--end::Card-->
    <div class="card card-custom gutter-b">
        @if($auction->questions()->doesntExist())
            <div class="card-body pt-4">
                No Questions Yet
            </div>
        @elseif($auction->answeredQuestions()->exists() && $auction->notAnsweredQuestions()->doesntExist())
            <div class="card-body pt-4">
                All Questions Are answered
                <p class="text-primary"><a href="{{route("dashboard.questions.index",['filter' => ['auction_id' => $auction->id,'answered' => true]])}}">see all</a></p>
            </div>
        @else
            <div class="card-body pt-4 bg-secondary-o-100">
                Some Questions need to be answered
                <p class="text-primary"><a href="{{route("dashboard.questions.index",['filter' => ['auction_id' => $auction->id]])}}">see all</a></p>
            </div>
        @endif
    </div>
</div>
