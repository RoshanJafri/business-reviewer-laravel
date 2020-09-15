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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'auth'], function () {
    Route::get('/businesses/create', 'BusinessController@create');
    Route::post('/businesses', 'BusinessController@store')->name('business.store');

    Route::post('/businesses/{business}/review', 'ReviewController@store')->name('reviews.store');

    Route::post('/reviews/{review}/react', 'ReviewReactionController@store')->name('reviews.react');
    // Route::delete('/reviews/{review}/react', 'ReviewReactionController@delete')->name('reviews.remove');

    Route::post('/businesses/review/{review}/reply', 'ReplyController@store');
});

Route::get('/businesses', 'BusinessController@index');
Route::get('/businesses/{business}', 'BusinessController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');