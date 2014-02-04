<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'FilesController@index');

Route::get('/Search', ['as'=>'Files.search','uses'=>'FilesController@Results']);
Route::post('/Search', ['as'=>'Files.results','uses'=>'FilesController@Results']);
Route::get('/User/Files/{id}',['as'=>'user.files','uses'=>'UsersController@index']);
Route::get('/User/create',['as'=>'user.create','uses'=>'UsersController@create']);
Route::post('/User',['as'=>'user.store','uses'=>'UsersController@store']);
Route::get('/delete/{id}',['as'=>'Files.delete','uses'=>'FilesController@destroy']);

Route::resource('Files','FilesController');
Route::get('login','SessionsController@create');
Route::get('logout','SessionsController@destroy'); 

Route::resource('sessions','SessionsController');