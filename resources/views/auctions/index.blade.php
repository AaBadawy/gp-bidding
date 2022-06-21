@extends('layout.default')

@push('styles')
    <link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endpush


@section('content')
    <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
        <div class="container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none"
                        id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->

                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class=" text-dark font-weight-bold my-1 mr-5 ml-2">Auctions</h5>
                    <!--end::Page Title-->

                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->

        </div>
    </div>

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <!--begin::Stats Widget 25-->
                    <div class="card card-custom bg-light-success card-stretch gutter-b">
                        <!--begin::Body-->
                        <nav class="card-body" >
                                    <span class="svg-icon svg-icon-2x svg-icon-success">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{\App\Entities\Auction::query()->forUser(auth()->user())->actualStatusIs('running')->count()}}</span>
                            <span class="font-weight-bold text-muted font-size-sm">Running Auctions</span>
                            <span class="font-weight-bold text-primary font-size-sm"><a href="{{route("dashboard.auctions.index",['filter' => ['actualStatusIs' => 'running']])}}">See All</a></span>
                        </nav>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 25-->
                </div>
                <div class="col-xl-4">
                    <!--begin::Stats Widget 26-->
                    <div class="card card-custom bg-light-danger card-stretch gutter-b">
                        <!--begin::ody-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-danger">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
															<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{\App\Entities\Auction::query()->actualStatusIs('upcoming')->forUser(auth()->user())->count()}}</span>
                            <span class="font-weight-bold text-muted font-size-sm">Total Upcoming Auctions</span>
                            <span class="font-weight-bold text-primary font-size-sm"><a href="{{route("dashboard.auctions.index",['filter' => ['actualStatusIs' => 'upcoming']])}}">See All</a></span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 26-->
                </div>
                <div class="col-xl-4">
                    <!--begin::Stats Widget 27-->
                    <div class="card card-custom bg-light-info card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
															<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
															<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
															<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
                            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{\App\Entities\Auction::query()->actualStatusIs('ended')->forUser(auth()->user())->count()}}</span>
                            <span class="font-weight-bold text-muted font-size-sm">Total Ended Auctions</span>
                            <span class="font-weight-bold text-primary font-size-sm"><a href="{{route("dashboard.auctions.index",['filter' => ['actualStatusIs' => 'ended']])}}">See All</a></span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 27-->
                </div>
            </div>
        </div>
        <!--begin::Subheader-->
        <!--end::Subheader-->
        <!--begin::Entry-->
        @if(request()->input('filter'))
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Notice-->
                <!--end::Notice-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-body">
                        @foreach(request()->input('filter',[]) as $key => $filter)
                            <x-datatable.filter :key="$key" :value="$filter" />
                        @endforeach
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        @endif
        <!--end::Entry-->
        <br>
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Notice-->
                <!--end::Notice-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-body">
                        {!! $dataTable->table(['class' => 'table table-separate table-head-custom table-checkable'], true) !!}
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{--    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>--}}
    {!! $dataTable->scripts() !!}
@endpush
