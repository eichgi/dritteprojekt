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


//use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/recursos', 'MainController@recursos');

Route::get('/buscador', 'MainController@buscador');

Route::get('/joker', 'JokerController@getWhatIWant');

//Route::get('/resource/show/{id}', 'ResourceController@show');

Route::resource('resource', 'ResourceController');
