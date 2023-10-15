<?php

use App\Http\Controllers\MapController;
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
Route::get('/', [VungtrongController::class, 'index']);
Route::post('/insert',[VungtrongController::class, 'insert'])->name('insert');;

// Bảng Bàng tư vấn
Route::get('/tu-van', 'TuVanController@index'); // Lấy danh sách
Route::post('/tu-van', 'TuVanController@store'); // Thêm mới
Route::put('/tu-van/{id}', 'TuVanController@update'); // Cập nhật 
Route::delete('/tu-van/{id}', 'TuVanController@destroy'); // Xóa

// Bảng Cán bộ quản lý
Route::get('/can-bo', 'CanBoController@index');
Route::post('/can-bo', 'CanBoController@store');
Route::put('/can-bo/{id}', 'CanBoController@update'); 
Route::delete('/can-bo/{id}', 'CanBoController@destroy');

// Bảng Sản lượng
Route::get('/san-luong', 'SanLuongController@index');  
Route::post('/san-luong', 'SanLuongController@store');
Route::put('/san-luong/{id}', 'SanLuongController@update');
Route::delete('/san-luong/{id}', 'SanLuongController@destroy');

// Lấy danh sách
Route::get('/sau-benh', 'SauBenhController@getList');
Route::post('/sau-benh', 'SauBenhController@create');  
Route::put('/sau-benh/{id}', 'SauBenhController@update');
Route::delete('/sau-benh/{id}', 'SauBenhController@delete');