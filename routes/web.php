<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'AkunController@dashboard');
Route::get('/keluhan', 'KeluhanController@index');
Route::delete('/keluhan/{id}', 'KeluhanController@hapus');

Route::get('/laporan', 'LaporanController@index');
Route::delete('/laporan/{id}', 'LaporanController@hapus');

Route::get('/akun', 'AkunController@index');
Route::delete('/akun/{id}', 'AkunController@hapus');

// Route::get('/login', function() {
//     return view('login1');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
