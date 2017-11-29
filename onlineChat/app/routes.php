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
Route::get('wall/{username}', 'AccountController@index');
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@loginPost');
Route::get('sign-up', 'AuthController@signUp');
Route::post('sign-up', 'AuthController@signUpPost');
Route::get('verification', 'AuthController@verification');
Route::post('verification', 'AuthController@verificationPost');
Route::get('forget-password', 'AuthController@forgetPassword');
Route::post('forget-password', 'AuthController@forgetPasswordPost');
Route::get('forget-password/{code}', 'AuthController@newPassword');
Route::post('new-password', 'AuthController@newPasswordPost');

Route::post('update-profile-pic', 'AccountController@updateProfilePic');
