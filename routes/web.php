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


Route::get('/', 'MainController@show');
Route::get('/ajax', 'MainController@ajax');
Route::get('/{brand}/{model_name}', 'MainController@test');
Route::get('/{brand}/{model}/{package_id}', 'MainController@test3ByPack')->where(['package_id' => '[0-9]+']);;
Route::get('/{brand}/{model}/{package}-{engine_id}', 'MainController@test3')->where(['package' => '[0-9]+']);
Route::get('/{brand}/{model}/{engine}/{group_name}_{group_id}', 'MainController@test4');
Route::get('/{brand_name}', 'MainController@test2');



