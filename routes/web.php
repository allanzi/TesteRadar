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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return redirect()->route('activities.index');
    });

    Route::group(['prefix' => '/activities', 'as' => 'activities.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'ActivitiesController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'ActivitiesController@create']);
        Route::post('/store', ['as' => 'store', 'uses' => 'ActivitiesController@store']);
        Route::get('/{id}/delete', ['as' => 'delete', 'uses' => 'ActivitiesController@delete']);
        Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'ActivitiesController@edit']);
        Route::put('/{id}/update', ['as' => 'update', 'uses' => 'ActivitiesController@update']);
    });
});