@extends('adminlte::page')

@section('title', 'Create Vendor')
@section('plugins.Datatables', true)
{{--@section('content_header')--}}
{{--    <h1 class="m-0 text-dark">Vendors</h1>--}}
{{--@stop--}}

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mx-5">
                <div class="card-header">
                    <h1 class="m-0 text-dark">Create Vendor</h1>
                </div>
                <div class="card-body">
                    @include('vendors.includes._form', ['action' => 'create'])
                </div>
            </div>
        </div>
    </div>
@stop
