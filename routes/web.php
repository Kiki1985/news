<?php

use Illuminate\Support\Facades\Route;

Route::get('/author', function () {
    return view('author');
});

Route::get('/', 'ArticlesController@index');

Route::get('category/{category}', 'CategoriesController@show');


Route::get('author/article/create', 'ArticlesController@create');

Route::get('/{category}/article/{id}', 'ArticlesController@show');

Route::post('/article', 'ArticlesController@store');


Route::get('author/register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');

Route::get('author/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/subscribe', 'SubscribersController@create');
Route::post('/subscribe', 'SubscribersController@store');
