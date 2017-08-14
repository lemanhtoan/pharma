<?php

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

include 'admin.php';
include 'form.php';
// Route::group(['middleware'=>'admin','namespace'=>'web'],function(){
// 	Route::get('/', function () {
	    
// 	});	
// });

Route::get('/admin', function () {
	return view('admin.index');	    
});


Route::get('login',['as'=>'login','uses'=>'LoginController@login']);
Route::post('login',['as'=>'login','uses'=>'LoginController@postLogin']);
Route::post('register',['as'=>'register','uses'=>'LoginController@register']);



Route::get('adminlogin',['as'=>'admin.login','uses'=>'LoginController@adminLogin']);
Route::post('adminlogin',['as'=>'admin.login','uses'=>'LoginController@adminPostLogin']);



Route::get('logout',['as'=>'logout','uses'=>'LoginController@logout']);
Route::get('success',['as'=>'success','uses'=>'LoginController@success']);
Route::get('adminlogout',['as'=>'logout.admin','uses'=>'LoginController@adminLogout']);

Route::get('tests',function(){
	return view('web.active-mail.forgotpassword');
});