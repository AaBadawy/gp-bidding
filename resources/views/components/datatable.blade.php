
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


@push('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{--    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>--}}
    {!! $dataTable->scripts() !!}
@endpush
