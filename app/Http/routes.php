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


Route::get('/',['uses' => 'UserController@mainPage', 'as' => 'main']);
Route::get('/{id}',['uses' => 'UserController@index', 'as' => 'user']);
Route::get('/{id}/edit',['uses' => 'UserController@editUser', 'as' => 'edit_user']);
Route::put('/{id}',['uses' => 'UserController@form', 'as' => 'myform']);




Route::group(['prefix' => 'event'], function() {

    Route::get('/create', ['uses' => 'EventController@createEvent', 'as' => 'create_event']);
    Route::post('/{id}/create', ['uses' => 'EventController@storeEvent', 'as' => 'store_event']);
    Route::get('/{event_id}/view', ['uses' => 'EventController@viewEvent', 'as' => 'view_event']);
    Route::get('/{event}/edit', ['uses' => 'EventController@editEvent', 'as' => 'edit_event']);
    Route::put('{user_id}/{event_id}/update', ['uses' => 'EventController@updateEvent', 'as' => 'update_event']);
    Route::post('/{event}/del', ['uses' => 'EventController@delEvent', 'as' => 'del_event']);

});

Route::post('/{event}/view',['uses'=>'CommentController@addComment','as'=>'addComment']);
Route::post('/{comment}/del',['uses'=>'CommentController@delComment','as'=>'del_comment']);




Route::get('/edit/{id}',['uses' => 'UserController@edit', 'as' => 'user_edit']);

Route::get('/user/id',['uses' => 'UserController@redirect']);