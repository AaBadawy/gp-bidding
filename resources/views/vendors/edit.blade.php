@extends('adminlte::page')

@section('title', 'Edit Vendor')
@section('plugins.Datatables', true)
{{--@section('content_header')--}}
{{--    <h1 class="m-0 text-dark">Vendors</h1>--}}
{{--@stop--}}

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mx-5">
                <div class="card-header">
                    <h1 class="m-0 text-dark">Edit Vendor</h1>
                </div>
                <div class="card-body">
                    @if(session()->has('errors'))
                        @foreach(session('errors') as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif
                    @include('vendors.includes._form', ['action' => 'edit'])
                </div>
            </div>
        </div>
    </div>
@stop
