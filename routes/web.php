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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile', ['as'=>'user-profile','uses'=>'HomeController@userProfile']);
Route::get('/list-claims', ['as'=>'claims-status','uses'=>'GstController@listClaims']);
Route::get('/add-claim', ['as'=>'add-claim','uses'=>'GstController@viewCreateClaim']);
Route::post('/add-new-claim', ['as'=>'add-new-claim','uses'=>'GstController@createClaims']);
Auth::routes();
Route::post('/update-user-avatar', 'UserController@update_avatar');
Route::post('/update-claim-status', ['as'=>'update-claim-status','uses'=>'StatusController@updateStatus']);
