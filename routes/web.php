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

//Handle display of posts
Route::get('/', 'PagesController@index'); //main page
Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); //users dashboard
Route::get('/single/{id?}', 'PostsController@displaySingle')->name('single'); //display single post

//Handle changes of posts
Route::get('/add', 'PostsController@add')->name('add'); //addForm
Route::delete('/destroy/{id}', 'PostsController@destroy')->name('destroy');
Route::post('/store', 'PostsController@store')->name('store'); //store in database
Route::get('/edit/{id?}', 'PostsController@edit')->name('edit');
Route::put('/update/{id?}', 'PostsController@update')->name('update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
