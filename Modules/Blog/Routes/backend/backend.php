<?php

Route::get('category', 'CategoryController@index')->name('category.index');
Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::post('category/store', 'CategoryController@store')->name('category.store');
Route::get('category/getdetails', 'CategoryController@getdetails')->name('category.getdetails');
Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('category/update', 'CategoryController@update')->name('category.update');
Route::get('category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');

Route::get('post', 'NewsController@index')->name('post.index');
Route::get('post/create', 'NewsController@create')->name('post.create');
Route::post('post/store', 'NewsController@store')->name('post.store');
Route::get('post/getdetails', 'NewsController@getdetails')->name('post.getdetails');
Route::get('post/edit/{id}', 'NewsController@edit')->name('post.edit');
Route::post('post/update', 'NewsController@update')->name('post.update');
Route::get('post/delete/{id}', 'NewsController@destroy')->name('post.destroy');



