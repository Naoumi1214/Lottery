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
//ホーム画面
Route::get('/', 'CompetitionsController@index');

//ログアウト
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

//テスト用
Route::get('/test', 'TestController@index');


Route::group(['middleware' => ['auth']], function () {
    //大会主催の登録関係
    Route::get('/create', 'CompetitionsController@create');
    Route::post('/create', 'CompetitionsController@insert');
    //ホストの主催一覧
    Route::get('/my', 'CompetitionsController@my');

    Route::get('/createWinningType/{id}', 'WinningTypesController@index');
});
//大会の詳細
Route::get('/details/{id}', 'CompetitionsController@details');
