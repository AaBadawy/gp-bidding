@extends('adminlte::page')

@section('title', 'Produccts')
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
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <script src="http://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    {{$dataTable->scripts()}}
@endpush

