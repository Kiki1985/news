<?php

use Illuminate\Support\Facades\Route;

Route::get('/authors', function () {
    return view('authors');
});

Route::get('/', 'ArticlesController@index');

Route::get('/categories/{category}', 'CategoriesController@show');

Route::get('/articles/{article}', 'ArticlesController@show');


Route::get('/category/{tag}', 'TagsController@index');


Route::get('/authors/articles/create', 'ArticlesController@create');


Route::post('/articles', 'ArticlesController@store');


Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/subscribers', 'SubscribersController@create');
Route::post('/subscribers', 'SubscribersController@store');
