<?php

use App\Http\Middleware\checkPO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('/', function () {
    return view('home');
});

Route::get('/regles', function () {
    return view('rules');
});

Auth::routes();

Route::match(['get', 'post'],'/profil', function () {
    return view('user');
})->middleware('auth');;

Route::match(['get', 'post'], '/quizz', function () {
    return view('quizz');
})->middleware('auth');;

Route::match(['get', 'post'],'/ajout', function () {
    return view('addingPoints');
})->middleware('auth');;

Route::match(['get', 'post'],'/challenges', function () {
    return view('challenges');
})->middleware('auth');;

Route::match(['get', 'post'],'/maisons', function () {
    return view('houses');
});

Route::match(['get', 'post'],'/historique', function () {
    return view('historique');
})->middleware('auth');;

Route::match(['get', 'post'],'/classements', function () {
    return view('rankings');
})->middleware('auth');;

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
