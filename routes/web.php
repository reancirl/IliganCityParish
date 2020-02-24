<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/weeklyPDF','HomeController@createPDF');
////////////////////////////////////////////////////////////////////////////////////////////
Route::group(['prefix' => 'baptismal'], function() {
	Route::get('/','BaptismalController@index')->name('baptismal.index');
	Route::get('/create','BaptismalController@create')->name('baptismal.create');
	Route::post('/','BaptismalController@store')->name('baptismal.store');
	Route::get('/{id}','BaptismalController@show')->name('baptismal.show');
	Route::get('/{id}/edit','BaptismalController@edit')->name('baptismal.edit');
	Route::patch('/{id}','BaptismalController@update')->name('baptismal.update');
});

Route::group(['prefix' => 'confirmation'], function() {
	Route::get('/','ConfirmationController@index')->name('confirmation.index');
	Route::get('/addConfirmation','ConfirmationController@searchBaptismal')->name('confirmation.search');;
	Route::get('/{id}/create','ConfirmationController@create')->name('confirmation.create');;
	Route::post('/{id}','ConfirmationController@store')->name('confirmation.store');;
	Route::get('/{id}','ConfirmationController@show')->name('confirmation.show');;
	Route::get('/{id}/edit','ConfirmationController@edit')->name('confirmation.edit');;
	Route::patch('/{id}','ConfirmationController@update')->name('confirmation.update');;
});

Route::group(['prefix' => 'marriage'], function() {
	Route::get('/','MarriageController@index')->name('marriage.index');
	Route::get('/wife','MarriageController@searchWife')->name('wife.search');
	Route::get('/wife/{id}','MarriageController@createWife')->name('wife.create');
	Route::post('/husband/{id}','MarriageController@storeWife')->name('wife.store');
	Route::get('/husband/{id}','MarriageController@searchHusband')->name('husband.search');
	Route::get('/husband/{wife}/{confirmation}','MarriageController@createHusband')->name('husband.create');
	Route::post('/create/{wife}/{confirmation}','MarriageController@storeHusband')->name('husband.store');
	Route::get('/create/{wife}/{confirmation}','MarriageController@create')->name('marriage.create');
	Route::post('/{wife}/{husband}', 'MarriageController@store')->name('marriage.store');
});