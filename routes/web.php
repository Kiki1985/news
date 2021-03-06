<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'ArticlesController@index');

Route::get('/', 'ArticlesController@index');

Route::get('/articles/create', 'ArticlesController@create');

Route::get('/{category:name}/{article:title}', 'ArticlesController@show');

Route::get('/{category:name}/{article:title}/edit', 'ArticlesController@edit');

Route::put('/{category:name}/{article:title}', 'ArticlesController@update');

Route::delete('/{category:name}/{article:title}', 'ArticlesController@destroy');

Route::post('/articles', 'ArticlesController@store');


Route::post('/articles/{article}/comments', 'CommentsController@store');

Route::delete('/comments/{comment}/delete', 'CommentsController@destroy');

Route::delete('/responses/{response}/delete', 'ResponsesController@destroy');

Route::post('/comments/{comment}/responses', 'ResponsesController@store');


Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');


Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/users/{user}/editUser', 'RegistrationController@edit');

Route::patch('/users/{user}', 'RegistrationController@update');

Route::delete('/users/{user}/deleteUser', 'RegistrationController@destroy');


Route::post('/subscribers', 'SubscribersController@store');


Route::get('/{category:name}', 'CategoriesController@index');
