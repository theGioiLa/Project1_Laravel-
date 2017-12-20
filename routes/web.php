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


Route::get('/trangchu', [
	'as'=>'homepage',
	'uses'=>'PageController@getIndex'
]);


Route::get('catalog/{type?}', [
	'as'=>'catalog',
	'uses'=>'PageController@getCatalog'
]);

Route::get('product_detail/{id?}', [
	'as'=>'detail',
	'uses'=>'PageController@getDetail'
]);

Route::get('contact', [
	'as' => 'contact',
	'uses' => 'PageController@getContact'
]);

Route::get('about', [
	'as' => 'about',
	'uses' => 'PageController@getAbout'
]);

Route::get('addToCart/{id}', [
	'as'=>'addToCart',
	'uses'=>'PageController@getAddToCart'
]);


Route::get('info' , function () {

	return view('page.info');
})->name('info');

Route::get('del-cart/{id}', [
	'as'=>'xoaItem',
	'uses'=>'PageController@delItemCart'
]);

Route::post('dathang', [
	'as' => 'purchase',
	'uses' => 'PageController@postCheckout'
]);

Route::get('dathang', function() {
	return view('page.checkout');
})->name('dathang');


Route::get('search', [
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
 
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' =>['auth']],function () {
	 	
	 	Route::get('/', function () {
	 		return view('admin.index');
	 	})->name('admin.index');

	 	Route::resource('product','ProductsController');
	 	Route::resource('category','CategoriesController');
});

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');