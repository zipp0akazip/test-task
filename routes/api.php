<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->get('/balance', 'Controller@balance')->name('balance');
Route::middleware('api')->post('/deposit', 'Controller@deposit')->name('deposit');
Route::middleware('api')->post('/withdraw', 'Controller@withdraw')->name('withdraw');
Route::middleware('api')->post('/transfer', 'Controller@transfer')->name('transfer');
