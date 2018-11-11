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

// Route for search view, if authenticated
Route::view('/', 'search')->middleware('auth');

// Route for results. If accessed by get, rediret to search view
Route::match(['get', 'post'], '/resultado', 'EnergisaController@result');
// Route::post('/resultado', 'EnergisaController@result');
// Route::get('/resultado', 'EnergisaController@result_error_get');

// Route for help page
Route::view('/ajuda', 'help')->middleware('auth');

// Route for contact page
Route::view('/contato', 'contact')->middleware('auth');

// Route for authentication
Auth::routes();

// Alternative route for search page
Route::get('/home', 'HomeController@index')->name('home');
