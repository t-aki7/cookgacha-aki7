<?php

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

Route::get('/', function () {
    return view('welcome');
});

//ユーザ登録
Route::get('Signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('Signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//
Route::resource('cooks', 'CooksController');

//
Route::post('search', 'SearchController@search')->name('cooks.search');


//vote
Route::group(['prefix' => 'cooks/{id}'], function() {
    Route::post('cooking', 'VotesController@cooking')->name('cooking.post');
    Route::delete('uncooking', 'VotesController@uncooking')->name('uncooking.delete');
});

Route::get('cooked', 'UsersController@cooked_index')->name('cooked_index');