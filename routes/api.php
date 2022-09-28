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

Route::group(['prefix' => 'slider'], function (){
    Route::post('/store', 'SliderController@store')->name('api.slider.store');
    Route::post('/update', 'SliderController@update')->name('api.slider.update');
    Route::post('/delete', 'SliderController@delete')->name('api.slider.delete');
    Route::post('/view', 'SliderController@view')->name('api.slider.view');
});

Route::group(['prefix' => 'page'], function (){
    Route::post('/update', 'PageController@update')->name('api.page.update');
    Route::post('/view', 'PageController@view')->name('api.page.view');
});

