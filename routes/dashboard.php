<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
| Here Will Be Any Request Belongs To The Dashboard
*/

Route::get('/', 'Dashboard\DashboardController')->name('dashboard');
Route::group(['prefix' => 'profile'],function () {
   Route::get("notifications","Auth\MyNotificationsController");
});
Route::get('/locations', 'LocationsController@dataTable')->name('locations.index');
Route::resource('/locations', 'LocationsController')->except(['index']);

Route::get('/vendors', 'VendorsController@dataTable')->name('vendors.index');
Route::put('/vendors/{vendor}/activation', 'VendorActivationController')->name('vendors.activation');
Route::resource('/vendors', 'VendorsController')->except(['index']);

Route::get('/products', 'ProductsController@dataTable')->name('products.index');
Route::resource('/products','ProductsController')->except(['index']);

Route::resource('/auctions','AuctionsController')->except(['index']);
Route::get('/auctions','AuctionsController@dataTable')->name('auctions.index');

Route::resource('/questions','QuestionsController')->except(['index']);
Route::get('/questions','QuestionsController@dataTable')->name('questions.index');

Route::resource('/orders','OrdersController')->except(['index']);
Route::get('orders', 'OrdersController@dataTable')->name('orders.index');

Route::resource('users/{user_type}/','UserController')->parameter("","user")->names([
    'edit'=>    'users.edit',
    'destroy'=>    'users.destroy',
    'show'=>    'users.show',
])->except('index');
Route::get("users/{user_type}","UserController@dataTable")->name('users.index');
Route::put('/users/{user_type}/{user}','UserActivationController')->name('users.activation');
Route::get('/users/{user_type}/{user}','UserController@show')->name('users.show');
Route::get("/bids","BiddingsController@datatable")->name("bids.index");
Route::get("chats","ChatPageController")->name("my-chats");
Route::get("vendor-requests",'VendorRequestsController@dataTable')->name('vendor-requests');

Route::resource("categories","CategoriesController")->except('index');
Route::get("categories","CategoriesController@dataTable")->name('categories.index');

Route::get("reviews","ReviewsController@dataTable")->name("reviews.index");
