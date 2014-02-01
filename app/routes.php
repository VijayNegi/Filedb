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

Route::get('/delete/{id}',['as'=>'Files.delete','uses'=>'FilesController@destroy']);

Route::resource('Files','FilesController');