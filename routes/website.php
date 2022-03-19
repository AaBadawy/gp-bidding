<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view("website.index");
})->name("main");

Route::prefix("auctions")->group(function (){
    Route::get("{auction}","AuctionDetailsController")->name("auction.details");
});

Route::middleware("auth:web")->namespace("Profile")->name("profile.")->group(function (){
    Route::get("/me","MyProfileController")->name("my-profile");
    Route::get("/involved-auctions","MyInvolvedAuctionsController")->name("my-involved-auctions");
    Route::get("/my-dashboard","MyDashboardController")->name("my-dashboard");
});
