@extends('adminlte::page')

@section('title', 'Create Auction')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mx-5">
                <div class="card-header">
                    <h1 class="m-0 text-dark">Create Auction</h1>
                </div>
                <div class="card-body">
                    @include('auctions.include._form', ['action' => 'create'])
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // $(function () {
            //     // $('#datetimepicker1').datetimepicker();
            //     $('.js-example-basic-single').select2({
            //         placeholder: "Select a Vendor",
            //         allowClear: true
            //     });
            // });
            $(function () {
                // $('#datetimepicker1').datetimepicker();
                // $('.products-select2').select2({
                //     placeholder: "Select products",
                //     allowClear: true
                // });
            });
        });
    </script>
@endpush
