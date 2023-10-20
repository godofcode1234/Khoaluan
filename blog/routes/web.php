<?php

use App\Http\Controllers\VungtrongController;
 use App\Http\Controllers\SauBenhController;
// use App\Http\Controllers\MapController;
// use App\Http\Controllers\MapController;
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
Route::get('/h', [VungtrongController::class, 'index']);
Route::post('/insert',[VungtrongController::class, 'insert'])->name('insert');;

// Bảng Bàng tư vấn
Route::get('/tu-van', [TuVanController::class, 'index']);  
Route::post('/tu-van', [TuVanController::class, 'store']);
Route::put('/tu-van/{id}', [TuVanController::class, 'update']); 
Route::delete('/tu-van/{id}', [TuVanController::class, 'destroy']);

// Cán bộ quản lý
Route::get('/can-bo', [CanBoController::class, 'index']);
Route::post('/can-bo', [CanBoController::class, 'store']);
Route::put('/can-bo/{id}', [CanBoController::class, 'update']);
Route::delete('/can-bo/{id}', [CanBoController::class, 'destroy']);

// Sản lượng
Route::get('/san-luong', [SanLuongController::class, 'index']);  
Route::post('/san-luong', [SanLuongController::class, 'store']);
Route::put('/san-luong/{id}', [SanLuongController::class, 'update']);
Route::delete('/san-luong/{id}', [SanLuongController::class, 'destroy']);

// Sâu bệnh
Route::get('/', [SauBenhController::class, 'index']);
Route::post('/sau-benh', [SauBenhController::class, 'create']);  
Route::put('/sau-benh/{id}', [SauBenhController::class, 'update']);
Route::delete('/sau-benh/{id}', [SauBenhController::class, 'delete']);

// Vùng trồng
Route::get('/vung-trong', [VungtrongController::class, 'index']);
Route::post('/vung-trong/insert', [VungtrongController::class, 'insert']);
Route::get('/vung-trong/delete/{id}', [VungtrongController::class, 'delete']);  
Route::get('/vung-trong/update', [VungtrongController::class, 'update']);