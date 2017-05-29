<?php

Route::group(['middleware'=>['web', 'auth'],'prefix' => 'dashboard'], function() {


	Route::group(['prefix' => 'modules'], function(){

		Route::get('/', [
			'as' => 'dashboard.module.index', 
			'uses' => 'Modules\Module\Controllers\ModuleController@index'
		]);

		Route::get('/{module}/active', [
			'as' => 'dashboard.module.index',
			'uses' => 'Modules\Module\Controllers\ModuleController@set_active'
		]);

		Route::get('/{module}/inactive', [
			'as' => 'dashboard.module.index',
			'uses' => 'Modules\Module\Controllers\ModuleController@set_inactive'
		]);

		Route::post('/check/change/active', [
			'as' => 'dashboard.module.index',
			'uses' => 'Modules\Module\Controllers\ModuleController@setCheckedActive'
		]);

		Route::post('/check/change/inactive', [
			'as' => 'dashboard.module.index',
			'uses' => 'Modules\Module\Controllers\ModuleController@setCheckedInactive'
		]);

	});

});