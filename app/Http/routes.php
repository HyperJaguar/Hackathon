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

Route::get('create-order', 'OrderController@index');
Route::get('admin','Admin\AdminController@index');

Route::post('create-order',array('as'=>'create-order','uses'=>'OrderController@addToCart'));




//cashier_Abhayan start//
Route::get('cashier/dashboard', array('as' => 'get-dashboard', 'uses' => 'cashierController@getDashboard'));
//cashier_Abhayan end//



// ----------------------------------- Sanchayan B -----------------------------------------------

//Route::get('create-order',array('as'=>'create-order','uses'=>'OrderController@index'));


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
