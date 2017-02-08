<?php

Route::get('/', function () {
    return view('user/home/home');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
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
});
