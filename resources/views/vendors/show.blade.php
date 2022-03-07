@extends('adminlte::page')

@section('title', 'Vendors')
{{--@section('plugins.Datatables', true)--}}
@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-5">
                                <div class="row mb-2">
                                    <strong class="ml-3"><span>Name : </span></strong>
                                    <span>{{ $vendor->name ?? 'N/A' }} </span>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="row mb-2">
                                    <strong class='ml-3'><span>Website : </span></strong>
                                    <span>{{$vendor->website }}</span>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="row mb-2">
                                    <strong class='ml-3'><span>Description : </span></strong>
                                    <span>{{ $vendor->description}} </span>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="row mb-2">
                                    <strong class='ml-3'><span>{{ __("created_at") }} : </span></strong>
                                    <span>{{$vendor->created_at}}</span>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

