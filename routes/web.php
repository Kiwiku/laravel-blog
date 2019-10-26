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

Route::get('/', 'PagesController@index'); //main page
Route::get('/add', 'PostsController@add')->name('add'); //addForm
Route::post('/store', 'PostsController@store')->name('store'); //store in database
Route::get('/single/{id?}', 'PagesController@displaySingle')->name('single'); //display single post

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
