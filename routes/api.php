<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'],function(){
    Route::get('/auctions', 'AuctionsController@index');
    Route::get('/auctions/{auction}', 'AuctionsController@show');
    Route::get('/auctions/products/{auction}', 'AuctionsController@auctionProducts');
    Route::post('/auctions', 'AuctionsController@store');
    Route::put('/auctions/{auction}', 'AuctionsController@update');
    Route::delete('/auctions/{auction}', 'AuctionsController@delete');


    Route::get('/auctions/{auction}/ratings', 'AuctionRatingsController@index');
    Route::get('/auctions/{auction}/ratings/{rating}', 'AuctionRatingsController@show');
    Route::post('/ratings', 'AuctionRatingsController@store');
    Route::put('/ratings/{rating}', 'AuctionRatingsController@update');
    Route::get('/orders', 'OrdersController@index');
    Route::get('/orders/{order}', 'OrdersController@show');
});

Route::post('/bids', 'BiddingsController@store');
Route::post('auth/register' , 'Auth\RegisterController');
Route::post('auth/login' , 'Auth\LoginController@login');
Route::post('auth/logout' , 'Auth\LogoutController')->middleware('auth:api');
