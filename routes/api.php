<?php

use Illuminate\Http\Request;
use App\Http\Controllers\MessageController;

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


Route::group(['prefix'=>'/v1'],function () {

      Route::get('messages', 'MessageController@index')->name('all-messages');
      Route::get('messages/{id}', 'MessageController@show')->name('show-message');
      Route::get('messages/{id}/read', 'MessageController@read')->name('read-message');
      Route::get('messages/{id}/archive', 'MessageController@archive')->name('archive-message');

});
