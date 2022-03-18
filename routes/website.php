<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view("website.index");
})->name("main");

Route::prefix("auctions")->group(function (){
    Route::get("{auction}","AuctionDetailsController")->name("auction.details");
});

Route::middleware("auth:web")->group(function (){
    Route::get("/me","MyProfileController");
});
