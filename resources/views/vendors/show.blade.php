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
                                    <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$vendor->name}}</a>
                                    <a href="#">
                                        <i class="flaticon2-correct text-success font-size-h5"></i>
                                    </a>
                                </div>
                                <div class="my-lg-0 my-3">
                                    <a href="{{route('dashboard.my-chats',['directTo' => $vendor->owner()->value('id')])}}" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Chat with owner</a>
                                    <livewire:dashboard.inactivate-user :user="$vendor"/>
                                </div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Content-->
                            <div class="d-flex flex-wrap justify-content-between mt-1">
                                <div class="d-flex flex-column flex-grow-1 pr-8">
                                    <div class="d-flex flex-wrap mb-4">
                                        <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2" title="email">
                                            <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{$vendor->email}}</a>
                                        <a href="{{$vendor->website}}" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <i class="flaticon2-website mr-2 font-size-lg"></i>Website link</a>
                                    </div>
                                    <span class="font-weight-bold text-dark-50">{{$vendor->description}}</span>
                                </div>
                            </div>
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
                                <span class="font-weight-bolder font-size-sm">Earnings</span>
                                <span class="font-weight-bolder font-size-h5">
                                                <span class="text-dark-50 font-weight-bold">$</span>{{$vendor->past_auctions_sum_current_price}}</span>
                            </div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                            <span class="mr-4">
                                                <i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
                                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">total starts</span>
                                <span class="font-weight-bolder font-size-h5">
                                                <span class="text-dark-50 font-weight-bold">$</span>{{$vendor->past_auctions_sum_start_price}}</span>
                            </div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                            <span class="mr-4">
                                                <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Net</span>
                                <span class="font-weight-bolder font-size-h5">
                                                <span class="text-dark-50 font-weight-bold">$</span>
                                    {{$vendor->past_auctions_sum_current_price - $vendor->past_auctions_sum_start_price}}
                                </span>
                            </div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mb-2 float-left">
                                            <span class="mr-4">
                                                <i class="flaticon-network display-4 text-muted font-weight-bold"></i>
                                            </span>
                            <div class="d-flex flex-column">
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Mark Stone">
                                    <span class="font-weight-bolder font-size-lg">{{$vendor->employees_count}} </span>Employees
                                </div>
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--begin::Items-->
                </div>
            </div>
            <!--end::Card-->
                <div class="separator separator-solid"></div>
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-8">
                    <!--begin::Advance Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Auctions</span>
                                @if($vendor->auctions_count)<span class="text-muted mt-3 font-weight-bold font-size-sm">total: {{$vendor->auctions_count}} </span>@endif
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
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2 pb-0 mt-n3">
                            <div class="tab-content mt-5" id="myTabTables11">
                                <!--begin::Tap pane-->
                                @if($vendor->past_auctions_count)
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
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($vendor->pastAuctions as $auction)
                                                    <tr>
                                                        <td class="pl-0 py-4">
                                                            <div class="symbol symbol-50 symbol-light">
                                                                <span class="symbol-label">
                                                                    <img src="{{$auction->products()->first()?->getFirstMediaUrl('main_image')}}" class="h-50 align-self-center" alt="" />
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="pl-0">
                                                            <a href="{{route('dashboard.auctions.show',['auction' => $auction->id])}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$auction->name}}</a>
                                                            <div>
                                                                <span class="font-weight-bolder">Total Items</span>
                                                                <a class="text-muted font-weight-bold text-hover-primary" href="#">{{$auction->products()->count()}}</a>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Current Price</span>
                                                            <span class="text-muted font-weight-bold">{{$auction->previewed_price}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="text-muted font-weight-500">{{$auction->status()}}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                @else
                                    <div class="tab-pane fade" id="kt_tab_pane_11_1" role="tabpanel" aria-labelledby="kt_tab_pane_11_1">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            No Past auctions
                                        </div>
                                    </div>
                                @endif
                                <!--end::Tap pane-->

                                <!--begin::Tap pane-->
                                @if($vendor->running_auctions_count)
                                    <div class="tab-pane fade" id="kt_tab_pane_11_2" role="tabpanel" aria-labelledby="kt_tab_pane_11_2">
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
                                                @foreach($vendor->runningAuctions as $auction)
                                                    <tr>
                                                        <td class="pl-0 py-4">
                                                            <div class="symbol symbol-50 symbol-light">
                                                                <span class="symbol-label">
                                                                    <img src="{{$auction->products()->first()?->getFirstMediaUrl('main_image')}}" class="h-50 align-self-center" alt="" />
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="pl-0">
                                                            <a href="{{route('dashboard.auctions.show',['auction' => $auction->id])}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$auction->name}}</a>
                                                            <div>
                                                                <span class="font-weight-bolder">Total Items</span>
                                                                <a class="text-muted font-weight-bold text-hover-primary" href="#">{{$auction->products()->count()}}</a>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Current Price</span>
                                                            <span class="text-muted font-weight-bold">{{$auction->previewed_price}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="text-muted font-weight-500">{{$auction->status()}}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                @else
                                    <div class="tab-pane fade" id="kt_tab_pane_11_2" role="tabpanel" aria-labelledby="kt_tab_pane_11_2">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            No Running auctions
                                        </div>
                                    </div>
                                @endif
                                <!--end::Tap pane-->

                                <!--begin::Tap pane-->
                                @if($vendor->upcomingAuctions_count)
                                    <div class="tab-pane fade" id="kt_tab_pane_11_3 active" role="tabpanel" aria-labelledby="kt_tab_pane_11_3">
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
                                                @foreach($vendor->upcoming_auctions as $auction)
                                                    <tr>
                                                        <td class="pl-0 py-4">
                                                            <div class="symbol symbol-50 symbol-light">
                                                                <span class="symbol-label">
                                                                    <img src="{{$auction->products()->first()?->getFirstMediaUrl('main_image')}}" class="h-50 align-self-center" alt="" />
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="pl-0">
                                                            <a href="{{route('dashboard.auctions.show',['auction' => $auction->id])}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$auction->name}}</a>
                                                            <div>
                                                                <span class="font-weight-bolder">Total Items</span>
                                                                <a class="text-muted font-weight-bold text-hover-primary" href="#">{{$auction->products()->count()}}</a>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Current Price</span>
                                                            <span class="text-muted font-weight-bold">{{$auction->previewed_price}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="text-muted font-weight-500">{{$auction->status()}}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                @else
                                    <div class="tab-pane fade" id="kt_tab_pane_11_3" role="tabpanel" aria-labelledby="kt_tab_pane_11_3">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            No Upcoming auctions
                                        </div>
                                    </div>
                                @endif
                                <!--end::Tap pane-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 2-->
                </div>
                <div class="col-lg-4">
                    <!--begin::Mixed Widget 14-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title font-weight-bolder">Owner Section</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <div class="pt-5">
                                <p class="text-dark font-weight-bold">Owner Name</p>
                                <p class="text-muted">{{$vendor?->owner?->name}}</p>
                            </div>
                            <div class="pt-5">
                                <p class="text-dark font-weight-bold">Owner Email</p>
                                <p class="text-muted">{{$vendor?->owner?->email}}</p>
                            </div>
                            <div class="pt-5">
                                <p class="text-dark font-weight-bold">Owner mobile</p>
                                <p class="text-muted">{{$vendor?->owner?->mobile}}</p>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 14-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@push('scripts')
    <script src="{{asset('js/pages/widgets.js')}}"></script>
@endpush
