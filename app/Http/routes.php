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
Route::post('cashier/dashboard', array('as' => 'post-dashboard-confirm', 'uses' => 'cashierController@postConfirmOrder'));
//cashier_Abhayan end//

//items_Aarooran start//
Route::get('addItems', 'foodItemsController@index');
Route::get('itemsDisplay', 'foodItemsController@displayItems');
Route::post('create', 'foodItemsController@create');

//items_Aarooran stop//



// ----------------------------------- Sanchayan B -----------------------------------------------

//Route::get('create-order',array('as'=>'create-order','uses'=>'OrderController@index'));


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


