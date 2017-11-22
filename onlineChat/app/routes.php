<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});
//Route::get('sign-up', function()
//{
//    return View::make('sign-up');
//});
//Route::get('login', function()
//{
//    return View::make('login');
//});
//Route::get('forget-password', function()
//{
//    return View::make('forget-password');
//});
Route::get('wall', 'AccountController@index');
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@loginPost');
Route::get('sign-up', 'AuthController@signUp');
Route::post('sign-up', 'AuthController@signUpPost');
