<?php

Route::group(['middleware'=>['web', 'auth'],'prefix' => 'dashboard'], function() {

	Route::group(['prefix' => 'categories'], function(){

		Route::get('/', [
				'as' => 'dashboard.categories.index',
				'uses' => 'Modules\Categories\Controllers\CategoryController@index'
			]);

		Route::post('/add', [
				'as' => 'dashboard.categories.add',
				'uses' => 'Modules\Categories\Controllers\CategoryController@store'
			]);

		// Route::get('/{category}/getData', [
		// 		'as' => 'dashboard.categories.edit',
		// 		'uses' => 'Modules\Categories\Controllers\CategoryController@getData'
		// 	]);

		Route::post('/edit', [
				'as' => 'dashboard.categories.edit',
				'uses' => 'Modules\Categories\Controllers\CategoryController@update'
			]);

		Route::delete('/delete', [
				'as' => 'dashboard.categories.delete',
				'uses' => 'Modules\Categories\Controllers\CategoryController@delete'
			]);

		Route::post('/delete_check', [
				'as' => 'dashboard.categories.delete',
				'uses' => 'Modules\Categories\Controllers\CategoryController@delete_check'
			]);

		Route::get('/{category}/detail', [
				'as' => 'dashboard.categories.detail',
				'uses' => 'Modules\Categories\Controllers\CategoryController@detail'
			]);

	});

});