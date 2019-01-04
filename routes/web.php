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

Route::get('/', [
    'as' => 'main',
    'uses' => 'mainController@show'
]);

Route::get('latest/{page?}', [
    'as' => 'latest',
    'uses' => 'latestController@show'
]);

Route::get('shop/{page?}', [
    'as' => 'shop',
    'uses' => 'shopController@show'
]);

Route::resources([
    'articles' => 'ArticleController',
    'items' => 'ItemController'
]);

Route::post ('articles/{id}', [
    'uses' => 'ArticleController@comment'
]);

Route::get('articles/{id}/like', [
    'uses' => 'ArticleController@like']);

Route::get('articles/{id}/dislike', [
    'uses' => 'ArticleController@dislike']);

Route::resource('reviews', 'ReviewController')->except([
    'create',
    'store',
]);

Route::get('reviews/create/{id}', [
    'as' => 'reviews.create',
    'uses' => 'ReviewController@create',
]);

Route::post('reviews/store/{id}', [
    'as' => 'reviews.store',
    'uses' => 'ReviewController@store',
]);

Route::post ('reviews/{id}', [
    'uses' => 'ReviewController@comment'
]);

Route::get('reviews/{id}/like', [
    'uses' => 'ReviewController@like']);

Route::get('reviews/{id}/dislike', [
    'uses' => 'ReviewController@dislike']);

Route::get('delivery', [
    'as' => 'delivery',
    'uses' => 'deliveryController@show'
]);

Route::post ('news/{id}', [
    'uses' => 'newsController@comment'
]);

Route::get('about', [
    'as' => 'about',
    'uses' => 'aboutController@show'
]);

Route::get('type/{type}', [
    'as' => 'type',
    'uses' => 'typeController@index'
]);

Route::get('items/{id}', [
    'as' => 'items',
    'uses' => 'oldItemController@show'
]);

Route::get('news/{id}', [
    'as' => 'news',
    'uses' => 'newsController@show'
]);

Route::get('brand/{brandName}', [
    'as' => 'brand',
    'uses' => 'brandController@index'
]);

Route::get('user/{id}', [
    'as' => 'user',
    'uses' => 'userController@show',
    'middleware' => 'auth'
]);

Route::post('user/{id}', [
    'as' => 'user',
    'uses' => 'userController@store',
    'middleware' => 'auth'
]);

Route::get('order/{id}', [
    'as' => 'order',
    'uses' => 'orderController@show',
    'middleware' => 'available'
]);

Route::post('order/{id}', [
    'as' => 'order',
    'uses' => 'orderController@store',
]);

Route::get('not_available', [
    'as' => 'not_available',
    'uses' => 'notAvailableController@show',
]);

Route::get('accepted/{id}', [
    'as' => 'accepted',
    'uses' => 'acceptedController@show'
]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
