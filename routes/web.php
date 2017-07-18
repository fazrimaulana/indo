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

Route::get('/about', 'FrontendController@about');

Route::get('/contact', 'FrontendController@contact');

Auth::routes();

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index', 'middleware' => ['checkrole:root|admin']]);

Route::get('/check-provider/{custom}', 'FrontendController@checkProvider');

Route::get('/get-provider/{id}', 'FrontendController@getProvider');

Route::get('/check-provider/paket-data/{custom}', 'FrontendController@checkProviderPaketData');

Route::get('/get-provider/paket-data/{id}', 'FrontendController@getProviderPaketData');

Route::get('/category/{category}', 'FrontendController@getCategory');

Route::get('/buy/pulsa', 'FrontendController@checkoutPulsa');

Route::post('/buy/pulsa', 'FrontendController@bayarEVoucher');

Route::get('/buy/paket', 'FrontendController@checkoutPaket');

Route::post('/buy/paket', 'FrontendController@bayarEVoucher');

Route::get('/buy/pln', 'FrontendController@checkoutPLN');

Route::post('/buy/pln', 'FrontendController@bayarEVoucher');

Route::get('/confirmation', 'FrontendController@confirmation');

Route::post('/confirmation', 'FrontendController@confirmationStore');

Route::get('/my-account', 'FrontendController@myAccount');

Route::get('/add-cart/{product}', 'FrontendController@addCart');

Route::get('/cart/{id}/remove', 'FrontendController@removeCart');

Route::get('/cart/carts', 'FrontendController@carts');

Route::get('/cart/carts/{id}/check', 'FrontendController@getCartCheck');

Route::get('/cart/carts/{id}/uncheck', 'FrontendController@getCartUncheck');

Route::get('/cart/carts/payment', 'FrontendController@getCartPayment');

Route::post('/cart/carts/payment', 'FrontendController@getCartPayment');

Route::post('/cart/carts/payment/order', 'FrontendController@getCartOrder');

Route::post('/cart/carts/delete_check', 'FrontendController@deleteCartChecked');

Route::get('/product/{product}', 'FrontendController@getProduct');

Route::get('/getCity', 'FrontendController@getCity');

Route::get('/getPaket', 'FrontendController@getPaket');

Route::get('/getService', 'FrontendController@getPaket');

Route::get('/getCost', 'FrontendController@getCost');

Route::get('/payment/product/{product}', 'FrontendController@getPaymentProduct');

Route::post('/payment/product/order', 'FrontendController@getProductOrder');

Route::get('/transaksi/{email}', 'FrontendController@getTransaksi');

Route::get('/transaksi/detail/{order}', 'FrontendController@detailTransaksi');

// Route::get('/database/input-banks', function(){

// 	$json = file_get_contents(database_path().'/banks.json');
// 	$datas = json_decode($json);

// 	foreach ($datas as $key => $value) {
		
// 		DB::table('banks')->insert([
// 				"name" => $value->name,
// 				"code" => $value->code
// 			]);

// 	}

// 	return redirect('/');

// });