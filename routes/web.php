<?php

Route::get('/home', 'HomeController@index')->name('home')->middleware(['can:super-admin','preventbackbutton']);
Route::get('/weeklyPDF','HomeController@createPDF')->name('weeklyPDF');
Route::get('/generatePDF','HomeController@generatePDF')->name('generatePDF');
Route::get('/yearlyPDF','HomeController@createYearlyPDF')->name('yearlyPDF');
Route::get('/generateYearlyPDF','HomeController@generateYearlyPDF')->name('generateYearlyPDF');
////////////////////////////////////////////////////////////////////////////////////////////
Route::prefix('baptismal')->middleware('preventbackbutton')->group(function(){
	Route::get('/','BaptismalController@index')->name('baptismal.index');
	Route::get('/create','BaptismalController@create')->name('baptismal.create');
	Route::post('/','BaptismalController@store')->name('baptismal.store');
	Route::get('/{id}','BaptismalController@show')->name('baptismal.show');
	Route::get('/{id}/edit','BaptismalController@edit')->name('baptismal.edit');
	Route::patch('/{id}','BaptismalController@update')->name('baptismal.update');
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
});

Route::prefix('activity-log')->middleware('preventbackbutton')->group(function(){
	Route::get('/','ActivityLogController@index')->name('activityLog.index');
});

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register' => false]);