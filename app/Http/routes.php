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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

//admin_Shenuka strat//
Route::get('admin','Admin\AdminController@index');
Route::post('admin','Admin\AdminConroller@register');
//admin_Shenuka end

Route::get('student/dashboard','foodItemsController@index');

//cashier_Abhayan start//
Route::get('cashier/dashboard', array('as' => 'get-dashboard', 'uses' => 'cashierController@getDashboard'));
//cashier_Abhayan end//


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
