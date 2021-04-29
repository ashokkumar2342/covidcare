<?php
//--------start-login--------- 
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha')->name('admin.refresh.captcha');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::post('login', 'Auth\LoginController@login');
Route::get('register', 'Auth\LoginController@register')->name('admin.register');
// Route::post('register-store', 'Auth\LoginController@registerStore')->name('admin.register.store');
Route::get('otp-verify', 'Auth\LoginController@otpVerify')->name('admin.otp-verify');
Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::get('district-update', 'DashboardController@districtUpdate')->name('admin.district.update');
	Route::post('district-update-post', 'DashboardController@districtUpdatePost')->name('admin.district.update.post');
	//-------start--UserManagement---------  
});	   