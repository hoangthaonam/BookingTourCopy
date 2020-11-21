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

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('login','LoginController@index')->name('admin.showlogin');
    Route::post('login','LoginController@login')->name('admin.login');
    Route::group(['middleware'=>'check_admin'],function(){
        Route::get('logout','LoginController@logout')->name('admin.logout');
        Route::get('/','DashboardController@index')->name('admin.dashboard');
    });
});
Route::group(['namespace'=>'User'],function(){
    Route::get('login','LoginController@index')->name('showlogin');
    Route::post('login','LoginController@login')->name('login');
    Route::get('register','RegisterController@index')->name('showregister'); 
    Route::post('register','RegisterController@store')->name('register'); 
    Route::get('home','HomeController@index')->name('home.index');
    Route::get('logout','LoginController@logout')->name('logout');
});