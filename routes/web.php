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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ch2', 'ProdController@index');

Route::POST('ch2/search', 'ProdController@show');

Route::get('/ch2/search/{id}', 'ProdController@search');

Route::get('/chkout', 'ApiController@index');

/*Route::get('/add-to-cart/{id}',[
    'uses'=>'Cart\CartController@AddToCart',
    'as'=>'movie.add-to-cart'
]);*/

Route::post('/checkout',[
    'uses'=>'ApiController@postCheckout',
    'as'=>'checkout',
    'middleware'=>'auth'
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('stripe', 'apiController@stripe');

Route::post('stripe', 'apiController@stripePost')->name('stripe.post');
