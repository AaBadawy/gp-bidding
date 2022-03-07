<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
| Here Will Be Any Request Belongs To The Dashboard
*/

Route::get('/', 'Dashboard\DashboardController')->name('dashboard');

Route::get('/locations', 'LocationsController@dataTable')->name('locations.index');
Route::resource('/locations', 'LocationsController')->except(['index']);

Route::get('/vendors', 'VendorsController@dataTable')->name('vendors.index');
Route::resource('/vendors', 'VendorsController')->except(['index']);

Route::get('/products', 'ProductsController@dataTable')->name('products.index');
Route::resource('/products','ProductsController')->except(['index']);

Route::resource('/auctions','AuctionsController')->except(['index']);
Route::get('/auctions','AuctionsController@dataTable')->name('auctions.index');

Route::resource('/orders','OrdersController')->except(['index']);
Route::get('orders', 'OrdersController@dataTable')->name('orders.index');
