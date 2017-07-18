<?php

Route::group(['middleware'=>['web', 'auth'],'prefix' => 'dashboard'], function() {

	Route::group(['prefix' => 'confirmations'], function(){

		Route::get('/', [
				'as' => 'dashboard.confirmations.index',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@index'
			]);

		Route::get('/add', [
				'as' => 'dashboard.confirmations.add',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@add'
			]);

		Route::post('/add', [
				'as' => 'dashboard.confirmations.add',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@store'
			]);

		Route::get('/{confirmation}/edit', [
				'as' => 'dashboard.confirmations.edit',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@getData'
			]);

		Route::post('/{confirmation}/edit', [
				'as' => 'dashboard.confirmations.edit',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@update'
			]);

		Route::delete('/delete', [
				'as' => 'dashboard.confirmations.delete',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@delete'
			]);

		Route::post('/delete_check', [
				'as' => 'dashboard.confirmations.delete',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@delete_check'
			]);

		Route::get('/{confirmation}/detail', [
				'as' => 'dashboard.confirmations.detail',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@detail'
			]);

		Route::get('/{order}/konfirmasi', [
				'as' => 'dashboard.confirmations.konfirmasi',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@konfirmasi'
			]);

		Route::get('/{order}/selesai', [
				'as' => 'dashboard.confirmations.selesai',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@selesai'
			]);

		Route::get('/search', [
				'as' => 'dashboard.confirmations.search',
				'uses' => 'Modules\Confirmation\Controllers\ConfirmationController@search'
			]);

	});

});