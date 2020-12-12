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

Route::get('', function () {
    return view('welcome');
});
//ルール

//解説欲しい。Routeはどこにある？get,routesとは？middlewareは？groupは？
//b.php
Route::get('todo/create', 'Admin\TodoController@add');

Auth::routes();//ユーザー認証

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => ''], function() {
    Route::get('todo/create', 'Admin\TodoController@add')->middleware('auth');
});//付け加えた物

Route::group(['middleware' => 'auth'], function() {
    Route::get('todo/create', 'Admin\TodoController@add');
    Route::post('todo/create', 'Admin\TodoController@create'); //追記
});

Route::get('todo', 'Admin\TodoController@index');