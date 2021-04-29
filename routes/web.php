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
 
Route::get('registration', 'Admin\RegistrationController@index')->name('user.registration');
Route::get('/', 'Admin\RegistrationController@index')->name('user.registration');
Route::post('store', 'Admin\RegistrationController@store')->name('admin.registration.store');





