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

Route::get('/', 'TransaksiController@index')->name('transaksi');
Route::post('/', 'TransaksiController@post')->name('transaksi');

Route::get('/edit/{item}', 'TransaksiController@edit')->name('edit');

Route::get('/hapus/{item}', 'TransaksiController@hapus')->name('hapus');

// route patch 
Route::patch('/edit/{item}', 'TransaksiController@update')->name('update');


// master item
Route::get('/masterItem', 'MasterController@index')->name('masterItem');
Route::post('/masterItem', 'MasterController@post')->name('post');

Route::get('/edit/master/{item}', 'MasterController@editMaster')->name('editMaster');
Route::patch('/edit/master/{item}', 'MasterController@updateMaster')->name('updateMaster');

Route::get('/hapus/{item}', 'MasterController@hapusMaster')->name('hapusMaster');

