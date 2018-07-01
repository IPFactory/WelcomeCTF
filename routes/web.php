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

// routing the purchase to Vue-Router

Route::group(["middleware"=>"web"],function () {
    //Default Rout
    Route::get('/{any}', function () {
        return view('app');
    })->where('any', '.*');
    // Social Auth
    Route::group(["middleware"=>"jwt.auth"],function () {

    });
});


Route::get('/home', 'HomeController@index')->name('home');
