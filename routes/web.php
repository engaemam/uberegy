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

Route::get('/', function () {
    return view('landing');
});
Route::get('/x', function () {
    return view('approvedcar');
});
Route::get('/euser', function () {
    return view('euser');
});
Route::get('/thanks', function () {
    return view('thanks');
});



Route::post('/contact/apply','Controller@apply_now')->name('send.request');
Route::post('/upload','Controller@uploadcar');
Route::post('/uploadsc','Controller@uploadscooter');
Route::get('/uberusers','HomeController@showmessages');
Route::get('/uberfiles','HomeController@showfiles');
Route::get('/scooter','HomeController@showscooter');
Route::get('/deleteU/id={id}', 'Controller@deleteDoc');
Route::get('/delete/id={id}', 'Controller@deletefile');
Route::get('/deleteS/id={id}', 'Controller@deletefiles');
Route::get('/show/email={email}', 'Controller@showfile');
Route::get('/export_excel/excel', 'ExportExcelController@export')->name('export_excel.excel');

Route::get('u01115777em/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('u01115777em/login', 'Auth\LoginController@login');
Route::post('u01115777em/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('admin_crs/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('admin_crs/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('admin_crs/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin_crs/password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/u01115777em', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');
