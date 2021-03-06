<?php

Route::get('/home', 'HomeController@index')->name('home')->middleware(['can:super-admin','preventbackbutton']);
////////////////////////////////////////////////////////////////////////////////////////////
Route::prefix('baptismal')->middleware('preventbackbutton')->group(function(){
	Route::get('/','BaptismalController@index')->name('baptismal.index');
	Route::get('/create','BaptismalController@create')->name('baptismal.create');
	Route::post('/','BaptismalController@store')->name('baptismal.store');
	Route::get('/{id}','BaptismalController@show')->name('baptismal.show');
	Route::get('/{id}/edit','BaptismalController@edit')->name('baptismal.edit');
	Route::patch('/{id}','BaptismalController@update')->name('baptismal.update');
});

Route::prefix('first-communion')->middleware('preventbackbutton')->group(function(){
	Route::get('/','FirstCommunionController@index')->name('communion.index');
	Route::get('/search-baptismal-record','FirstCommunionController@search')->name('communion.search');
	Route::get('/{id}/create','FirstCommunionController@create')->name('communion.create');
	Route::post('/{id}','FirstCommunionController@store')->name('communion.store');
	Route::get('/{id}/edit','FirstCommunionController@edit')->name('communion.edit');
	Route::patch('/{id}','FirstCommunionController@update')->name('communion.update');
	Route::delete('/{id}','FirstCommunionController@destroy')->name('communion.delete');
});

Route::prefix('confirmation')->middleware('preventbackbutton')->group(function(){
	Route::get('/','ConfirmationController@index')->name('confirmation.index');
	Route::get('/addConfirmation','ConfirmationController@searchBaptismal')->name('confirmation.search');
	Route::get('/{id}/create','ConfirmationController@create')->name('confirmation.create');
	Route::post('/{id}','ConfirmationController@store')->name('confirmation.store');
	Route::get('/{id}','ConfirmationController@show')->name('confirmation.show');
	Route::get('/{id}/edit','ConfirmationController@edit')->name('confirmation.edit');
	Route::patch('/{id}','ConfirmationController@update')->name('confirmation.update');
});

Route::prefix('marriage')->middleware('preventbackbutton')->group(function(){
	Route::get('/','MarriageController@index')->name('marriage.index');
	Route::get('/wife','MarriageController@searchWife')->name('wife.search');
	Route::get('/wife/{id}','MarriageController@createWife')->name('wife.create');
	Route::post('/husband/{id}','MarriageController@storeWife')->name('wife.store');
	Route::get('/husband/{id}','MarriageController@searchHusband')->name('husband.search');
	Route::get('/husband/{wife}/{confirmation}','MarriageController@createHusband')->name('husband.create');
	Route::post('/create/{wife}/{confirmation}','MarriageController@storeHusband')->name('husband.store');
	Route::get('/create/{wife}/{confirmation}','MarriageController@create')->name('marriage.create');
	Route::post('/{wife}/{husband}', 'MarriageController@store')->name('marriage.store');
	Route::get('/{id}','MarriageController@show')->name('marriage.show');
	Route::get('/{id}/edit','MarriageController@edit')->name('marriage.edit');
	Route::patch('/{id}','MarriageController@update')->name('marriage.update');
});

Route::prefix('users')->middleware(['can:super-admin','preventbackbutton'])->group(function(){
	Route::get('/','UsersController@index')->name('users.index');
	Route::get('/create','UsersController@create')->name('users.create');
	Route::post('/store','UsersController@store')->name('users.store');
	Route::get('/edit/{id}','UsersController@edit')->name('users.edit');
	Route::patch('/edit/{id}','UsersController@update')->name('users.update');
});

Route::prefix('reports')->middleware('preventbackbutton')->group(function(){
	Route::get('/','ReportsController@index')->name('reports.index');
	Route::get('/weekly-report','ReportsController@weekly')->name('reports.weekly');
	Route::get('/yearly-report','ReportsController@yearly')->name('reports.yearly');
	Route::get('/generate-weekly-report','ReportsController@generateWeekly')->name('reports.generateWeekly');
	Route::get('/generate-yearly-report','ReportsController@generateYearly')->name('reports.generateYearly');
	Route::get('/diocese-of-iligan-weekly-report','ReportsController@dioceseWeekly')->name('reports.dioceseWeekly');
	Route::get('/diocese-of-iligan-yearly-report','ReportsController@dioceseYearly')->name('reports.dioceseYearly');
	Route::get('/generate-diocese-weekly-report','ReportsController@generateDioceseWeekly')->name('reports.generateDioceseWeekly');
	Route::get('/generate-diocese-yearly-report','ReportsController@generateDioceseYearly')->name('reports.generateDioceseYearly');
});

Route::prefix('activity-log')->middleware(['can:activity-log-view','preventbackbutton'])->group(function(){
	Route::get('/','ActivityLogController@index')->name('activityLog.index');
});

Route::get('account-settings', 'AccountSettingsController@index')->name('account.index')->middleware('preventbackbutton');
Route::post('account-settings', 'AccountSettingsController@store')->name('account.store')->middleware('preventbackbutton');
Route::get('account-settings-email-username', 'AccountSettingsController@edit')->name('account.edit')->middleware('preventbackbutton');
Route::post('account-settings-email-username', 'AccountSettingsController@update')->name('account.update')->middleware('preventbackbutton');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register' => false]);