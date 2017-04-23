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

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/recursos', 'MainController@recursos');

Route::get('/buscador', 'MainController@buscador');

Route::get('/joker', 'JokerController@getWhatIWant');

Route::resource('resource', 'ResourceController');
