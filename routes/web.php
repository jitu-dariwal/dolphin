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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile', 'HomeController@saveProfile')->name('saveProfile');
Route::any('/email', 'HomeController@email');
