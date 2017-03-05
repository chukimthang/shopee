<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.',
    'middleware' => ['auth', 'admin']], function() {
        
    Route::resource('category', 'CategoryController', ['only' => 'index']);

    Route::post('category/addAjax', [
        'as' => 'category.addAjax', 
        'uses' => 'CategoryController@postAddAjax'
    ]);

    Route::post('category/updateAjax', [
        'as' => 'category.updateAjax',
        'uses' => 'CategoryController@postUpdateAjax'
    ]);

    Route::post('category/deleteAjax', [
        'as' => 'category.deleteAjax',
        'uses' => 'CategoryController@postDeleteAjax'
    ]);

    Route::get('category/search', [
        'as' => 'category.search',
        'uses' => 'CategoryController@search'
    ]);

    Route::resource('user', 'UserController', ['only' => 'index']);

    Route::post('user/deleteAjax', [
        'as' => 'user.deleteAjax',
        'uses' => 'UserController@postDeleteAjax'
    ]);

    Route::get('user/search', [
        'as' => 'user.search',
        'uses' => 'UserController@search'
    ]);
});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.',
    'middleware' => 'auth'], function() {

    Route::resource('shop', 'ShopController', ['only' => 'create']);

    Route::post('shop/uploadImage', [
        'as' => 'shop.uploadImage',
        'uses' => 'ShopController@postUploadImage'
    ]);

    Route::post('shop/addAjax', [
        'as' => 'shop.addAjax',
        'uses' => 'ShopController@postAddAjax' 
    ]);
});

Route::group(['prefix' => 'seller', 'namespace' => 'Seller', 'as' => 'seller.',
    'middleware' => ['auth', 'seller']], function() {

    Route::resource('home', 'HomeController', ['only' => 'index']);

    Route::resource('collection', 'CollectionController',
        ['only' => ['index', 'store']]);

    Route::post('collection/updateAjax', [
        'as' => 'collection.updateAjax',
        'uses' => 'CollectionController@postUpdateAjax'
    ]);

    Route::post('collection/deleteAjax', [
        'as' => 'collection.deleteAjax',
        'uses' => 'CollectionController@postDeleteAjax'
    ]);

    Route::resource('product', 'ProductController', ['only' => ['index', 'show']]);

    Route::post('product/uploadImage', [
        'as' => 'product.uploadImage',
        'uses' => 'ProductController@postUploadImage'
    ]);

    Route::post('product/addAjax', [
        'as' => 'product.addAjax',
        'uses' => 'ProductController@postAddAjax'
    ]);

    Route::post('product/updateAjax', [
        'as' => 'product.updateAjax',
        'uses' => 'ProductController@postUpdateAjax'
    ]);

    Route::post('product/deleteAjax', [
        'as' => 'product.deleteAjax',
        'uses' => 'ProductController@postDeleteAjax'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('shop', 'ShopController', ['only' => 'index']);
