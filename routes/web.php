<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ArticlesController@index');

Route::get('/articles/create', 'ArticlesController@create');

Route::get('/{category:name}/{article:title}', 'ArticlesController@show');

Route::get('/{category:name}/{article:title}/edit', 'ArticlesController@edit');

Route::put('/{category:name}/{article:title}', 'ArticlesController@update');

Route::delete('/{category:name}/{article:title}', 'ArticlesController@destroy');

Route::post('/articles', 'ArticlesController@store');


Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');


Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');




Route::post('/subscribers', 'SubscribersController@store');


Route::get('/{category:name}', 'CategoriesController@index');
