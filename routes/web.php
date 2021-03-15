<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuarios', 'UserController');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
