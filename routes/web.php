<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
////////////////////////////////////////////////////////////
Route::group(['prefix' => 'baptismal'], function() {
	Route::get('/','BaptismalController@index')->name('baptismal.index');
	Route::get('/create','BaptismalController@create')->name('baptismal.create');
	Route::post('/','BaptismalController@store')->name('baptismal.store');
	Route::get('/{id}','BaptismalController@show')->name('baptismal.show');
	Route::get('/{id}/edit','BaptismalController@edit')->name('baptismal.edit');
	Route::patch('/{id}','BaptismalController@update')->name('baptismal.update');
});

Route::group(['prefix' => 'confirmation'], function() {
	Route::get('/','ConfirmationController@index')->name('confimation.index');
	Route::get('/addConfirmation','ConfirmationController@searchBaptismal')->name('confimation.search');;
	Route::get('/{id}/create','ConfirmationController@create')->name('confimation.create');;
	Route::post('/{id}','ConfirmationController@store')->name('confimation.store');;
	Route::get('/{id}','ConfirmationController@show')->name('confimation.show');;
	Route::get('/{id}/edit','ConfirmationController@edit')->name('confimation.edit');;
	Route::patch('/{id}','ConfirmationController@update')->name('confimation.update');;
});
////////////////////////////////////////////////////////////
					//Marriage//
////////////////////////////////////////////////////////////
Route::get('/marriage','MarriageController@index');
Route::get('/wife','MarriageController@searchWife');
Route::get('/wife/{id}','MarriageController@createWife');
Route::post('/husband/{id}','MarriageController@storeWife');
// Route::get('/husband','MarriageController@searchHusband');
// Route::get('/husband/{id}','MarriageController@createHusband');
// Route::post('/marriage/{id}','MarriageController@storeHusband');