<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('barang','ApiController@get_all_barang');
Route::post('barang/tambah_barang','ApiController@insert_data_barang');
Route::put('barang/update/{kode_barang}','ApiController@update_data_barang');
Route::delete('barang/hapus/{kode_barang}','ApiController@delete_data_barang');
