<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
####################### LOGIN ROUTE #########################

	Route::get('/login', 'MainController@index')->name('login');
	Route::post('/login','MainController@check_login');

##############################################################

Route::group(['middleware' => 'auth:web'],function(){

//main controllers

#######################################################

	################################################################################################
	Route::get('/', 'ClaintController@index')->name('index');	
	Route::post('claint','ClaintController@store')->name('claint');
	Route::get('/logout','MainController@logout')->name('logout');
	################################################################################################
	

	################################################################################################
	Route::get("order" ,'MainController@user')->name('order');
	################################################################################################
	

	################################################################################################
	Route::get('new','ClaintController@new')->name('new');
	Route::get('complete','ClaintController@complete')->name('comp');
	Route::get('delivered','ClaintController@delivered')->name('del');
	Route::get('rejected','ClaintController@rejected')->name('rej');
	################################################################################################


	################################################################################################
	Route::get('user_report','ReportController@user');
	Route::post('user_report','ReportController@user_report')->name('user_report');

	Route::get('rejected_report','ReportController@rejected');
	Route::post('rejected_report','ReportController@rejected_report')->name('rejected_report');

	Route::get('delivered_report','ReportController@delivered');
	Route::post('delivered_report','ReportController@delivered_report')->name('delivered_report');
	################################################################################################


	################################################################################################

	Route::get('user','MainController@add_user_page');
	Route::post('user','MainController@add_user')->name('add_user');


	################################################################################################
	Route::get('status_0/{id}','ClaintController@status_0')->name('status0');
	Route::get('status_1/{id}','ClaintController@status_1')->name('status1');
	Route::get('status_2/{id}','ClaintController@status_2')->name('status2');
	Route::get('status_3/{id}','ClaintController@status_3')->name('status3');
	################################################################################################

	Route::get('print/{id}','ClaintController@print')->name('print');

#######################################################
});
	

