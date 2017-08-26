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

//ui get routes
Route::get('/', 'PublicAreaController@index')->name('index');
Route::get('/sign-up', 'PublicAreaController@signUp')->name('sign-up-page');
Route::get('/sign-in', 'PublicAreaController@signIn')->name('login');
Route::get('/request-new-password', 'PublicAreaController@requestPassword')->name('request-password-change-page');








//UserController
Route::post('/sign-up', [

   'uses' => 'UserController@signUp',
    'as' => 'sign-up'

]);

Route::post('/sign-in', [

    'uses' => 'UserController@signIn',
    'as' => 'sign-in'

]);

Route::post('/update-user', [
    'uses' => 'UserController@updateUser',
    'as' => 'update-user'
]);

Route::post('/new-password', [
    'uses' => 'UserController@sendPasswordReset',
    'as' => 'send-password-reset'
]);

Route::post('/change-password', [
    'uses' => 'UserController@changePassword',
    'as' => 'update-password'
]);

Route::get('/sign-out', [
    'uses' => 'UserController@signOut',
    'as' => 'sign-out'
]);

//MemberAreaController
Route::get('/dashboard', [

    'uses' => 'MemberAreaController@getDashboard',
    'as' => 'lb-dashboard',
    'middleware' => 'auth'

]);
Route::get('/sell', [

    'uses' => 'MemberAreaController@getSellPage',
    'as' => 'lb-sell-page',
    'middleware' => 'auth'

]);

//WalletController
Route::post('/generate-wallet', [
    'uses' => 'WalletController@genWallet',
    'as' => 'gen-ltc-wallet',
]);

//ItemController
Route::post('/list-item', [
    'uses' => 'ItemController@listItem',
    'as' => 'list-item',
]);