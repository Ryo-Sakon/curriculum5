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

Route::get('todo/index', 'Admin\TodoController@index');

Route::get('todo/edit/{id}', 'Admin\TodoController@edit'); // 追記
Route::post('todo/edit', 'Admin\TodoController@update'); // 追記

Route::get('todo/delete/{id}', 'Admin\TodoController@delete');

Route::get('todo/complete', 'Admin\TodoController@complete');
Route::get('todo/complete_list', 'Admin\TodoController@complete_list');
Route::get('todo/incomplete', 'Admin\TodoController@incomplete');

Route::group(['middleware' => 'auth'], function() {
    Route::get('todo/create', 'Admin\TodoController@add');
    Route::post('todo/create', 'Admin\TodoController@create'); //追記
    Route::get('todo', 'Admin\TodoController@index'); // 追記
    Route::get('todo/edit', 'Admin\TodoController@edit'); // 追記
    Route::post('todo/edit', 'Admin\TodoController@update'); // 追記
    Route::get('todo/delete', 'Admin\TodoController@delete');
    Route::get('todo/complete', 'Admin\TodoController@complete');
    Route::get('todo/complete_list', 'Admin\TodoController@complete_list');
    Route::get('todo/incomplete', 'Admin\TodoController@incomplete');
    Route::get('todo/sort', 'Admin\TodoController@sort');
    Route::get('todo/dead_list', 'Admin\TodoController@dead_list');
    Route::post('todo/dead_list', 'Admin\TodoController@search_dead_list');
});