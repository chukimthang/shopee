<?php

Route::get('/', function () {
    return view('user/home/home');
});

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

Auth::routes();

Route::get('/home', 'HomeController@index');
