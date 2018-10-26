<?php

//Get Requests
Route::get('/books/create/', 'BooksController@create');
Route::get('/books/{isbn}/', 'BooksController@show');
Route::get('/books', 'BooksController@index');
Route::get('/', 'HomeController@index');

//Post Request
Route::post('/books', 'BooksController@store');
