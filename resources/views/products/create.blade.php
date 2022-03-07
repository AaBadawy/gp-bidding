@extends('adminlte::page')

@section('title', 'Create Product')
@section('plugins.Datatables', true)
@section('plugins.Select2', true)
{{--@section('content_header')--}}
{{--    <h1 class="m-0 text-dark">Vendors</h1>--}}
{{--@stop--}}

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mx-5">
                <div class="card-header">
                    <h1 class="m-0 text-dark">Create Product</h1>
                </div>
                <div class="card-body">
                    @include('products.includes._form', ['action' => 'create'])
                </div>
            </div>
        </div>
    </div>
@stop
