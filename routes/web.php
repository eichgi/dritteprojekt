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

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/signup', 'LoginController@signUpForm');
Route::post('/signup', 'LoginController@signUp');
Route::get('/logout', 'LoginController@logout');

Route::resource('perfil', 'ProfileController');

//Route::get('/recursos', 'MainController@recursos');
//Route::get('/recursos', 'MainController');

Route::get('/buscador', 'MainController@buscador');
Route::get('/buscar', 'MainController@buscar');

Route::get('/joker', 'JokerController@joker');

Route::resource('resource', 'ResourceController');
