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
    return view('home');
});

//ログアウト
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

//テスト用
Route::get('/test', 'TestController@index');

//大会関係
Route::get('/create', 'CompetitionsController@create');
