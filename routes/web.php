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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/list', 'UserController@index')->name('user_list');
Route::get('/user/delete/{id}','UserController@destroy')->name('user_delete');
Route::get('/user/add','UserController@add')->name('user_add');
Route::post('/user/create','UserController@create')->name('user_create');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user_edit');
Route::patch('/user/update/{id}', 'UserController@update')->name('user_update');