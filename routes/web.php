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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index');
Route::get('/add', 'PostsController@add')->name('add');
Route::post('/store', 'PostsController@store')->name('store');
Route::get('/single/{id?}', 'PagesController@displaySingle')->name('single');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
