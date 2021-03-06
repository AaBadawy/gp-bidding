@extends("layout.default")

@push('styles')
    <link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section("content")

    <div class="container-fluid">
        <!--end::Notice-->
    </div>
    <div class="container-fluid">
        <!--Begin::Row-->
        <div class="row">
            <div class="col-xl-3">
                <!--begin::Stats Widget 25-->
                <div class="card card-custom bg-light-light card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-2x svg-icon-success">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                                    <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="font-weight-bold text-muted font-size-sm">Auction Status</span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$auction->status()}}</span>
{{--                        <span class="font-weight-bold text-muted font-size-sm">See In website</span>--}}
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><a
                                href="{{route('website.auction.details',['auction' => $auction->id])}}" target="_blank">See In website</a></span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 25-->
            </div>
            <div class="col-xl-3">
                <!--begin::Stats Widget 25-->
                <div class="card card-custom bg-light-success card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-2x svg-icon-success">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                                    <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><livewire:auctions.final-details :auction="$auction" :preview="'->previewed_price'"/></span>
                        <span class="font-weight-bold text-muted font-size-sm">Current Price</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 25-->
            </div>
            <div class="col-xl-3">
                <!--begin::Stats Widget 26-->
                <div class="card card-custom bg-light-danger card-stretch gutter-b">
                    <!--begin::ody-->
                    <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-danger">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24" />
															<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><livewire:auctions.final-details :auction="$auction" :preview="'bidders->count()'"/></span>
                        <span class="font-weight-bold text-muted font-size-sm">Total Involved Clients</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 26-->
            </div>
            <div class="col-xl-3">
                <!--begin::Stats Widget 27-->
                <div class="card card-custom bg-light-info card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
															<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
															<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
															<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><livewire:auctions.final-details :auction="$auction" :preview="'->biddings()->count()'"/></span>
                        <span class="font-weight-bold text-muted font-size-sm">Total Bids</span>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 27-->
            </div>
        </div>
        <!--End::Row-->

        <div class="row">

            <livewire:dashboard.auction.last-bidder :auction="$auction"/>

            <div class="col-xxl-9 order-2 order-xxl-12">
                <!--begin::Advance Table Widget 2-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">Auction Bids</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm">Total Bids are:  <livewire:auctions.final-details :auction="$auction" :preview="'biddings()->count()'"/></span>
                        </h3>
                        @if($auction->biddings_count > 0)
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" href="{{route('dashboard.bids.index',['filter' => ['auction_id' => $auction->id]])}}" target="_blank">See All Bids</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2 pb-0 mt-n3">
                        <div class="tab-content mt-5" id="myTabTables11">

                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_tab_pane_11_1" role="tabpanel" aria-labelledby="kt_tab_pane_11_1">
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
                                        @foreach($auction->biddings as $bid)
                                            <tr>
                                                <td class="pl-0 py-4">
                                                    <div class="symbol symbol-50 symbol-light">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="">
                                            </span>
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$bid->client->name}}</a>
                                                    <div>
                                                        <span class="font-weight-bolder">Email:</span>
                                                        <a class="text-muted font-weight-bold text-hover-primary" href="#">{{$bid->client->email}}</a>
                                                        <livewire:block-client :client="$bid->client" />
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Egp {{$bid->amount_price}}</span>
                                                    <span class="text-muted font-weight-bold">Paid</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-muted font-weight-500"></span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$bid->created_at->toDateString()}}</span>
                                                    <span class="text-muted font-weight-bold">Date</span>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$bid->created_at->toTimeString()}}</span>
                                                    <span class="text-muted font-weight-bold">Time</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Advance Table Widget 2-->
            </div>

        </div>

        <!--begin::Card-->
        <div class="card card-custom col-xxl-12">
            <div class="card-body">
                <table class="table table-separate table-head-custom table-checkable">
                    <thead>
                        <tr>
                            <th>product Image</th>
                            <th>product Title</th>
                            <th>product Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($auction->products as $product)
                        <tr>
                            <td>
                                <img src="{{ ! empty($product->getFirstMediaUrl('main_image')) ? $product->getFirstMediaUrl('main_image') : asset_metronic("media/products/22.png")}}" alt="" class="h-50 align-self-center" width="20%" height="20%">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

