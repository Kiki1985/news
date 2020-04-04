<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ArticlesController@index');

Route::get('/articles/create', 'ArticlesController@create');

Route::get('/articles/{article}', 'ArticlesController@show');

Route::post('/articles', 'ArticlesController@store');


Route::get('/categories/{category}', 'CategoriesController@index');


Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/subscribers', 'SubscribersController@create');

Route::post('/subscribers', 'SubscribersController@store');
