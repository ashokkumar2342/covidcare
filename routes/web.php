<?php
use App\Helper\MyFuncs;
 
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
Route::get('/func', function () {
    return MyFuncs::full_name("John","Doe");
});
 
Route::get('/', 'Admin\RegistrationController@mobileVerification')->name('user.mobile.verification'); 
Route::get('mobile-verification', 'Admin\RegistrationController@mobileVerification')->name('user.mobile.verification');
Route::get('mobile-verification-store', 'Admin\RegistrationController@mobileVerificationStore')->name('user.mobile.verification.store');
Route::get('mobile-verification-otp/{mobile}', 'Admin\RegistrationController@mobileVerificationOtp')->name('user.mobile.verification.otp');
Route::post('mobile-otp-verification/{mobile}', 'Admin\RegistrationController@mobileOtpVerification')->name('user.mobile.otp.verification'); 
Route::get('registration/{mobile}', 'Admin\RegistrationController@registration')->name('user.registration');
Route::get('block-mcs', 'Admin\RegistrationController@blockMcs')->name('block.mcs');
Route::get('village/{district_id}', 'Admin\RegistrationController@village')->name('village');

Route::post('store/{mobile}', 'Admin\RegistrationController@store')->name('admin.registration.store');


Route::get('covid-complaints', 'Admin\CovidComplaintsController@index')->name('covid.complaints');
Route::post('covid-complaints-store', 'Admin\CovidComplaintsController@store')->name('covid.complaints.store');






