<?php

Route::group(['middleware'=>['web', 'auth'],'prefix' => 'dashboard'], function() {


	Route::group(['prefix' => 'users'], function(){

		Route::get('/', [
				'as' => 'dashboard.users.index',
				'uses' => 'Modules\Users\Controllers\UserController@index'
			]);

		Route::get('/add', [
				'as' => 'dashboard.users.add',
				'uses' => 'Modules\Users\Controllers\UserController@add'
			]);

		Route::post('/add', [
				'as' => 'dashboard.users.add',
				'uses' => 'Modules\Users\Controllers\UserController@store'
			]);

		Route::get('/{user}/edit', [
				'as' => 'Users',
				'uses' => 'Modules\Users\Controllers\UserController@getData'
			]);

		Route::post('/{user}/edit', [
				'as' => 'Users',
				'uses' => 'Modules\Users\Controllers\UserController@update'
			]);

		Route::get('/{user}/change-password', [
				'as' => 'Users',
				'uses' => 'Modules\Users\Controllers\UserController@getChangePassword'
			]);

		Route::post('/{user}/change-password', [
				'as' => 'Users',
				'uses' => 'Modules\Users\Controllers\UserController@changePassword'
			]);

		Route::delete('/delete', [
				'as' => 'Users',
				'uses' => 'Modules\Users\Controllers\UserController@delete'
			]);

		Route::post('/delete-users', [
				'as' => 'Users',
				'uses' => 'Modules\Users\Controllers\UserController@deleteUsers'
			]);

		Route::get('/{user}/profile', [
				'as' => 'dashboard.users.profile',
				'uses' => 'Modules\Users\Controllers\UserController@detail'
			]);

		Route::get('/profile', [
				'as' => 'dashboard.users.profile',
				'uses' => 'Modules\Users\Controllers\UserController@profile'
			]);

		Route::post('/{user}/change-photo', [
				'as' => 'dashboard.users.profile',
				'uses' => 'Modules\Users\Controllers\UserController@changePhoto'
			]);

	});


});