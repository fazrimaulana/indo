<?php

Route::group(['middleware'=>['web', 'auth'],'prefix' => 'dashboard'], function() {
	

		Route::group(['prefix' => 'orders'], function(){

			Route::get('/', [
					'as' => 'dashboard.orders.index', 
					'uses' => 'Modules\Orders\Controllers\OrderController@index'
				]);	

			Route::get('/add', [
					'as' => 'dashboard.orders.add', 
					'uses' => 'Modules\Orders\Controllers\OrderController@add'
				]);

			Route::get('/{order}/edit', [
					'as' => 'dashboard.orders.edit', 
					'uses' => 'Modules\Orders\Controllers\OrderController@getData'
				]);

			Route::get('/search', [
					'as' => 'dashboard.orders.search', 
					'uses' => 'Modules\Orders\Controllers\OrderController@search'
				]);

			Route::get('/{order}/detail', [
					'as' => 'dashboard.orders.detail', 
					'uses' => 'Modules\Orders\Controllers\OrderController@detail'
				]);

			Route::delete('/delete', [
					'as' => 'dashboard.orders.delete', 
					'uses' => 'Modules\Orders\Controllers\OrderController@delete'
				]);	

			Route::post('/delete_check', [
					'as' => 'dashboard.orders.delete.check', 
					'uses' => 'Modules\Orders\Controllers\OrderController@deleteCheck'
				]);	

		});

		Route::group(['prefix' => 'transaction-methods'], function(){

			Route::get('/', [
					'as' => 'dashboard.orders.transaction.methods.index', 
					'uses' => 'Modules\Orders\Controllers\TransactionMethodController@index'
				]);

			Route::post('/add', [
					'as' => 'dashboard.orders.transaction.methods.add', 
					'uses' => 'Modules\Orders\Controllers\TransactionMethodController@store'
				]);

			Route::get('/{transactionMethod}/getData', [
					'as' => 'dashboard.orders.transaction.methods.getdata', 
					'uses' => 'Modules\Orders\Controllers\TransactionMethodController@getData'
				]);

			Route::post('/edit', [
					'as' => 'dashboard.orders.transaction.methods.edit', 
					'uses' => 'Modules\Orders\Controllers\TransactionMethodController@update'
				]);

			Route::delete('/delete', [
					'as' => 'dashboard.orders.transaction.methods.delete', 
					'uses' => 'Modules\Orders\Controllers\TransactionMethodController@delete'
				]);

		});


});