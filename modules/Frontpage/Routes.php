<?php

Route::group(['middleware'=>['web', 'auth'],'prefix' => 'dashboard'], function() {

	Route::group(['prefix' => 'frontpage'], function(){

		Route::get('/slideshow', [
				'as' => 'dashboard.frontpage.index.slideshow',
				'uses' => 'Modules\Frontpage\Controllers\FrontpageController@index'
			]);

		Route::get('/slideshow/add', [
				'as' => 'dashboard.frontpage.index.slideshow.add',
				'uses' => 'Modules\Frontpage\Controllers\FrontpageController@add'
			]);

		Route::post('/slideshow/add', [
				'as' => 'dashboard.frontpage.index.slideshow.add',
				'uses' => 'Modules\Frontpage\Controllers\FrontpageController@store'
			]);		

	});

});