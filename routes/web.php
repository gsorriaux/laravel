<?php

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

Route::get('/', 'NavController@home');

Route::view('/test', 'test');

Route::get('/listing', 'NavController@list');


Route::get('/contact', 'NavController@contact');

Route::get('/add', 'NavController@add');

Route::post('/add', 'ActionController@addOne');

Route::get('/addAuthor', 'NavController@addAuthor');
Route::post('/addAuthor', 'ActionController@addOneAuthor');

Route::get('/supp', 'NavController@supp');
Route::post('/supp', 'ActionController@deleteBook');

Route::post('/suppAuthor', 'ActionController@deleteAuthor');

Route::post('/update', 'ActionController@updateBook');
Route::post('/updateAuthor', 'ActionController@updateAuthor');

