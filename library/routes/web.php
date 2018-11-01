<?php
/*
 * GET METHODS
 */

//basic
Route::get('/books/create/', 'BooksController@create');
Route::get('/books/{isbn}/', 'BooksController@show');
Route::get('/books', 'BooksController@index');
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');

//user
Route::get('/register', 'RegistrationsController@create');
Route::get('/login', 'SessionsController@create')->name('login');
Route::get('/logout', 'SessionsController@destroy')->name('logout');
Route::get('/me', 'SessionsController@index');
Route::get('/edit', 'RegistrationsController@edit');

//admin
Route::get('/users', 'UsersController@index');

/*
 * POST METHODS
 */

//basic
Route::post('/books', 'BooksController@store');

//user
Route::post('/login', 'SessionsController@store');
Route::post('/register', 'RegistrationsController@store');
Route::post('/update', 'RegistrationsController@update');

//search
Route::post('/search', 'QueryController@search');