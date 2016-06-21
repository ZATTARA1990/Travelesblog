<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',['uses' => 'UserController@mainPage', 'as' => 'main']);
Route::get('/{id}',['uses' => 'UserController@index', 'as' => 'user']);
Route::put('/{id}',['uses' => 'UserController@form', 'as' => 'myform']);
Route::post('/',['uses' => 'UserController@addEvent', 'as' => 'form']);





Route::get('/{id}/create',['uses'=>'EventController@createEvent','as'=>'create_event']);
Route::post('/{id}/create',['uses'=>'EventController@storeEvent','as'=>'store_event']);
Route::get('/{event_id}/view',['uses'=>'EventController@viewEvent','as'=>'view_event']);




Route::get('/edit/{id}',['uses' => 'UserController@edit', 'as' => 'user_edit']);

Route::get('/user/id',['uses' => 'UserController@redirect']);