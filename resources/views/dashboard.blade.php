@extends('adminlte::page')

@section('title', 'Antique')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
        <div class="">

        </div>

    </div>
    <div class="row">
        <h3 class="col-12 p-3">You Orders Stats</h3>
        <x-countable-component
            :count="\App\Entities\Order::basedOnAuth()->status('pending')->count()"
            :title="'Pending Orders'"
            :color="'warning'"
        />
        <x-countable-component
            :count="\App\Entities\Order::basedOnAuth()->status('in progress')->count()"
            :title="'In Progress Orders'"
            :color="'info'"
        />
        <x-countable-component
            :count="\App\Entities\Order::basedOnAuth()->status('delivered')->count()"
            :title="'Delivered Orders'"
            :color="'success'"
        />
    </div>
    <div class="row">
        <h3 class="col-12 p-3">You Auctions Stats</h3>
        <x-countable-component
            :count="\App\Entities\Auction::basedOnAuth()->status('pending')->count()"
            :title="'Pending Auctions'"
            :color="'warning'"
        />
        <x-countable-component
            :count="\App\Entities\Auction::basedOnAuth()->status('started')->count()"
            :title="'Started Auctions'"
            :color="'info'"
        />
        <x-countable-component
            :count="\App\Entities\Auction::basedOnAuth()->status('finished')->count()"
            :title="'Finished Auctions'"
            :color="'success'"
        />
    </div>
@stop
