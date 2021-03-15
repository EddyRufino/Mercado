<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', 'UserController');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
