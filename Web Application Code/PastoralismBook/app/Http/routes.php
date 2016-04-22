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

//Route::get('/', 'WelcomeController@index');
Route::get('/', 'HospitalController@index');
/*
*Profile Routes
*/
Route::get('/profileAdd','HospitalController@getProfileAdd');
Route::post('/profileAdd','HospitalController@postProfileAdd');
Route::get('/profileDetail','HospitalController@getProfileDetail');
Route::get('/profileSingle','HospitalController@getProfile');
Route::get('/contactList','HospitalController@getContactList');

/*
*Test Routes
*/
Route::get('/addTest','HospitalController@getAddTest');
Route::post('/addTest','HospitalController@postAddTest');
Route::get('/allTest','HospitalController@getAllTest');
Route::post('/allTest','HospitalController@postEditTest');
Route::get('/DelTest','HospitalController@DelTest');

/*
*Doctor Routes
*/
Route::get('/addDoctor','HospitalController@getAddDoctor');
Route::post('/addDoctor','HospitalController@postAddDoctor');
Route::get('/allDoctor','HospitalController@getAllDoctor');
Route::post('/allDoctor','HospitalController@postAllDoctor');
Route::get('/DelDoctor','HospitalController@DelDoctor');
Route::get('/referenceList','HospitalController@referenceList');

/*
*Patient
*/
Route::get('/addPatient','HospitalController@getAddPatient');
Route::post('/addPatient','HospitalController@PostAddPatient');
Route::post('/savePatient','HospitalController@savePatient');

Route::get('/allPatient','HospitalController@GetAllPatient');
Route::get('/patientDetail','HospitalController@patientDetail');

/*
* Statements
*/

Route::get('/dailyIncome','HospitalController@dailyIncomeStatement');
Route::get('/dailyDue','HospitalController@dailyDueStatement');

/*
* Clearing Report
*/
Route::get('/clearingReport','HospitalController@getClearingReport');
Route::post('/clearingReport','HospitalController@postClearingReport');
Route::post('/PayDueClearingReport','HospitalController@clearingReportDue');

/*
*Blog Starts
*/
Route::get('/blog','HospitalController@blog');
Route::get('/article','HospitalController@article');
/*
*Blog End
*/

/*
*
*/

Route::get('/d','HospitalController@getMachineData');
Route::get('/check','HospitalController@showMachineTestData');
Route::get('/jsonData','HospitalController@showMachineJsonData');
Route::get('/angularData','HospitalController@showMachineDataAngular');
/*
*
*/


/*
* Logout
*/
Route::get('/logOut','HospitalController@logOut');


Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
