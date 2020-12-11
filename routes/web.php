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

Route::get('/sakon', function () {
    return view('sakon');
});

Route::get('todo/create', 'Admin\TodoController@add');
//todo/createはsakon.com以下のディレクトリを表し、アクセスされたページのこと。
//Admin\TodoControllerはHTTPをrootとしたディレクトリの位置。@addはコントローラのAction名。
//ab

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => ''], function() {
    Route::get('todo/create', 'Admin\TodoController@add')->middleware('auth');
});