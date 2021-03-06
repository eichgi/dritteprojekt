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


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return redirect('/');
});
//Route::get('/login', 'LoginController@index');
//Route::post('/login', 'LoginController@login');
Route::get('/signup', 'LoginController@signUpForm');
Route::post('/signup', 'LoginController@signUp');
Route::get('/login/{provider}', 'LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'LoginController@handleProviderCallback');
Route::get('/logout', 'LoginController@logout');

Route::resource('profile', 'ProfileController');

Route::get('/buscar', 'MainController@buscar');
Route::get('/about', 'MainController@about');
Route::get('/joker', 'JokerController@resources');

Route::post('/star/fav', 'StarController@favHandler');
Route::resource('resource', 'ResourceController');
//Route::resource('star', 'StarController');
