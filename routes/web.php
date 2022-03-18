<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();

Route::middleware("guest")
->group(function (){
    Route::get('/login', 'Auth\LoginController@loginView')->name('login');
    Route::get("/register","Auth\RegisterController@registerView")->name("register");
    Route::post("/register","Auth\RegisterController@register")->name("submit.register");
    Route::post('/login', 'Auth\LoginController@login')->name('submit.login');
    Route::post('/logout', 'Auth\LogoutController')->name('logout');
});

/************************* Product Routes ************************/

Route::get('index','ProductsController@index');
Route::get('create','ProductsController@create');
Route::post('store','ProductsController@store')->name('Store');
Route::get('edit/{id}','ProductsController@edit')->name('edit');
Route::post('update/{id}','ProductsController@update')->name('Update');
Route::get('delete/{id}','ProductsController@destroy')->name('delete');
