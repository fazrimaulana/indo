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

// Route::get('/', function () {
//     return view('frontend.welcome');
// });

Route::get('/', 'FrontendController@index');

Auth::routes();

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index', 'middleware' => ['checkrole:root|admin']]);

Route::get('/check-provider/{custom}', 'FrontendController@checkProvider');

Route::get('/get-provider/{id}', 'FrontendController@getProvider');
