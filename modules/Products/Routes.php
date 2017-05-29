<?php

Route::group(['middleware'=>['web', 'auth'],'prefix' => 'dashboard'], function() {

	Route::group(['prefix' => 'products'], function(){

		Route::get('/', [
				'as' => 'dashboard.products.index',
				'uses' => 'Modules\Products\Controllers\ProductController@index'
			]);

		Route::get('/add', [
				'as' => 'dashboard.products.add',
				'uses' => 'Modules\Products\Controllers\ProductController@add'
			]);

		Route::post('/add', [
				'as' => 'dashboard.products.add',
				'uses' => 'Modules\Products\Controllers\ProductController@store'
			]);

		Route::post('/galleries/add', [
				'as' => 'dashboard.products.galleries.add',
				'uses' => 'Modules\Products\Controllers\ProductController@storeGalleries'
			]);

		Route::delete('/galleries/delete', [
				'as' => 'dashboard.products.galleries.delete',
				'uses' => 'Modules\Products\Controllers\ProductController@deleteGalleries'
			]);

		Route::get('/galleries/{lastid}/set_utama/{id}', [
				'as' => 'dashboard.products.galleries.utama',
				'uses' => 'Modules\Products\Controllers\ProductController@setUtamaGalleries'
			]);

		Route::get('/{product}/edit', [
				'as' => 'dashboard.products.edit',
				'uses' => 'Modules\Products\Controllers\ProductController@getData'
			]);

		Route::post('/{product}/edit', [
				'as' => 'dashboard.products.edit',
				'uses' => 'Modules\Products\Controllers\ProductController@update'
			]);

		Route::get('/{id_product}/set-utama/{id_gallery}', [
				'as' => 'dashboard.products.set.utama',
				'uses' => 'Modules\Products\Controllers\ProductController@productGallerySetUtama'
			]);

		Route::delete('/delete/gallery', [
				'as' => 'dashboard.products.gallery.delete',
				'uses' => 'Modules\Products\Controllers\ProductController@productGalleryDelete'
			]);

		Route::delete('/delete', [
				'as' => 'dashboard.products.delete',
				'uses' => 'Modules\Products\Controllers\ProductController@delete'
			]);

		Route::post('/delete-check', [
				'as' => 'dashboard.products.delete.checked',
				'uses' => 'Modules\Products\Controllers\ProductController@deleteChecked'
			]);

		Route::get('/{product}/detail', [
				'as' => 'dashboard.products.detail',
				'uses' => 'Modules\Products\Controllers\ProductController@detail'
			]);

		Route::get('/search', [
				'as' => 'dashboard.products.search',
				'uses' => 'Modules\Products\Controllers\ProductController@search'
			]);

	});

});