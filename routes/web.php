<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/recursos', function () {
    return view('recursos');
});

Route::get('/buscador', function () {
    return view('buscador');
});