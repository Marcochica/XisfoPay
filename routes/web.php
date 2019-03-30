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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/employees', 'UsersController@employees')->name('employees');


Route::group(['middleware' => ['role:super-admin|editor|moderador']], function() {
    Route::resource('usuarios', 'UsersController');
});

Route::resources([
	'/admin/money'     => 'Admin\MoneyController',
    '/admin/transfers' => 'Admin\TransfersController',
    '/admin/withdrawal' => 'Admin\WithdrawalController'
]);

Route::get('/admin/transfers/searchEmail/{email}', 'Admin\TransfersController@searchEmail')->name('searchEmail');
