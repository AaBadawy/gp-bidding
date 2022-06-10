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
                    <h5 class=" text-dark font-weight-bold my-1 mr-5 ml-2">
                        {{ __('main.show') }} {{ __('main.orders') }} </h5>
                    <!--end::Page Title-->

                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-muted">
                                {{ __('main.home') }} </a>
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
        <!--begin::Subheader-->
        <!--end::Subheader-->
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
