<?php

use App\Http\Controllers\helper\PelaporanController;
use App\Http\Controllers\helper\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'App\Http\Controllers\Auth\LoginController@login');
Route::resource('/user', UserController::class);
Auth::routes(['login' => false]);


Route::resource('pelaporan',PelaporanController::class);

Route::get('/map', 'App\Http\Controllers\Api\MapController@index')->name('map.index');
Route::post('/save-coordinates', 'App\Http\Controllers\Api\MapController@saveCoordinates');
