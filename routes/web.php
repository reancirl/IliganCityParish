<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
////////////////////////////////////////////////////////////
					//Baptismal//
////////////////////////////////////////////////////////////
Route::get('/baptismal','BaptismalController@index');
Route::get('/baptismal/create','BaptismalController@create');
Route::post('/baptismal','BaptismalController@store');
Route::get('/baptismal/{id}','BaptismalController@show');
Route::get('/baptismal/{id}/edit','BaptismalController@edit');
Route::patch('/baptismal/{id}','BaptismalController@update');
////////////////////////////////////////////////////////////
					//Confirmation//
////////////////////////////////////////////////////////////
Route::get('/confirmation','ConfirmationController@index');
Route::get('/addConfirmation','ConfirmationController@searchBaptismal');
Route::get('/confirmation/{id}/create','ConfirmationController@create');
Route::post('/confirmation/{id}','ConfirmationController@store');
Route::get('/confirmation/{id}','ConfirmationController@show');
Route::get('/confirmation/{id}/edit','ConfirmationController@edit');
Route::patch('/confirmation/{id}','ConfirmationController@update');
////////////////////////////////////////////////////////////
					//Marriage//
////////////////////////////////////////////////////////////
Route::get('/marriage','MarriageController@index');
Route::get('/husband','MarriageController@searchHusband');
Route::get('/husband/{id}','MarriageController@createHusband');
Route::post('/marriage/{id}','MarriageController@storeHusband');