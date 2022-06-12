@extends('layout.default')

@section('content')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <!--begin::Details-->
                <div class="d-flex mb-9">
                    <!--begin: Pic-->
                    <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                        <div class="symbol symbol-50 symbol-lg-120">
                            <img src="assets/media/users/300_1.jpg" alt="image" />
                        </div>
                        <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                            <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between flex-wrap mt-1">
                            <div class="d-flex mr-3">
                                <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$user->name}}</a>
                                <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$user->email}}</a>
                                @if($user->is_owner)
                                    <a href="#" title="the owner">
                                        <i class="flaticon2-correct text-success font-size-h5"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="my-lg-0 my-3">
                                <a href="{{route('dashboard.my-chats',['directTo' => $user->id])}}" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3" >Chat</a>
{{--                                <a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">Block</a>--}}
                            </div>
                        </div>
                        <!--end::Title-->
                        <!--begin::Content-->
{{--                        <div class="d-flex flex-wrap justify-content-between mt-1">--}}
{{--                            <div class="d-flex flex-column flex-grow-1 pr-8">--}}
{{--                                <div class="d-flex flex-wrap mb-4">--}}
{{--                                    <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2" title="employee email">--}}
{{--                                        <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{$user->email}}</a>--}}
{{--                                    <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2" title="vendor">--}}
{{--                                        <i class="flaticon2-calendar-3 mr-2 font-size-lg" ></i>{{$user->vendor?->name}}</a>--}}
{{--                                    <a href="#" class="text-dark-50 text-hover-primary font-weight-bold" title="city">--}}
{{--                                        <i class="flaticon2-placeholder mr-2 font-size-lg"></i>{{$user->city?->name}}</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center w-25 flex-fill float-right mt-lg-12 mt-8">--}}
{{--                                <span class="font-weight-bold text-dark-75">Profile Progress</span>--}}
{{--                                <div class="progress progress-xs mx-3 w-100">--}}
{{--                                    <div class="progress-bar bg-success" role="progressbar" style="width: 63%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                </div>--}}
{{--                                <span class="font-weight-bolder text-dark">78%</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!--end::Content-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->
                <div class="separator separator-solid"></div>
                <!--begin::Items-->
                <div class="d-flex align-items-center flex-wrap mt-8">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                            <span class="mr-4">
                                                <i class="flaticon-piggy-bank display-4 text-muted font-weight-bold"></i>
                                            </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Status</span>
                            <span class="font-weight-bolder font-size-h5">{{$user->status}}</span>
                        </div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                            <span class="mr-4">
                                                <i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
                                            </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Expenses</span>
                            <span class="font-weight-bolder font-size-h5">
                                                <span class="text-dark-50 font-weight-bold">Egp</span>{{$user->vendor?->loadSum("auctions","current_price")->auctions_sum_current_price}}</span>
                        </div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                            <span class="mr-4">
                                                <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                                            </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Total Auctions</span>
                            <span class="font-weight-bolder font-size-h5">
                                                <span class="text-dark-50 font-weight-bold"></span>{{$user->vendor?->auctions()->count()}}</span>
                        </div>
                    </div>
                    <!--end::Item-->
                </div>
                <!--begin::Items-->
            </div>
        </div>
        <!--end::Card-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Advance Table Widget 2-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <nav class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">Auctions</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm">More than {{$user->auctions_count}} </span>
                        </h3>
                        <div class="card-toolbar">
                            <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                <li class="nav-item">
                                    <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_11_1">Past</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_11_2">Running</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_11_3">Upcoming</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2 pb-0 mt-n3">
                        <div class="tab-content mt-5" id="myTabTables11">
                            <!--begin::Tap pane-->
                            @if($user->vendor?->past_auctions_count)
                                <div class="tab-pane fade" id="kt_tab_pane_11_1" role="tabpanel" aria-labelledby="kt_tab_pane_11_1">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-borderless table-vertical-center">
                                        <thead>
                                        <tr>
                                            <th class="p-0 w-40px"></th>
                                            <th class="p-0 min-w-200px"></th>
                                            <th class="p-0 min-w-100px"></th>
                                            <th class="p-0 min-w-125px"></th>
                                            <th class="p-0 min-w-110px"></th>
                                            <th class="p-0 min-w-150px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->vendor?->pastAuctions as $auction)
                                            <x-dashboard.auction-fast-details :auction="$auction" />
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            @endif
                            <!--end::Tap pane-->

                            <!--begin::Tap pane-->
                            @if($user->vendor?->running_auctions_count)
                                <div class="tab-pane fade" id="kt_tab_pane_11_2" role="tabpanel" aria-labelledby="kt_tab_pane_11_1">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-vertical-center">
                                            <thead>
                                            <tr>
                                                <th class="p-0 w-40px"></th>
                                                <th class="p-0 min-w-200px"></th>
                                                <th class="p-0 min-w-100px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                                <th class="p-0 min-w-110px"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->vendor?->runningAuctions as $auction)
                                                <x-dashboard.auction-fast-details :auction="$auction" />
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                            @endif
                            <!--end::Tap pane-->

                            <!--begin::Tap pane-->
                            @if($user->vendor?->upcoming_auctions_count)
                                <div class="tab-pane fade" id="kt_tab_pane_11_3 active" role="tabpanel" aria-labelledby="kt_tab_pane_11_1">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-vertical-center">
                                            <thead>
                                            <tr>
                                                <th class="p-0 w-40px"></th>
                                                <th class="p-0 min-w-200px"></th>
                                                <th class="p-0 min-w-100px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                                <th class="p-0 min-w-110px"></th>
                                                <th class="p-0 min-w-150px"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->vendor?->upcomingAuctions as $auction)
                                                <x-dashboard.auction-fast-details :auction="$auction" />
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                            @endif
                            <!--end::Tap pane-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Advance Table Widget 2-->
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection
