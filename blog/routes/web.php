<?php

use App\Http\Controllers\VungtrongController;
use App\Http\Controllers\SauBenhController;
use App\Http\Controllers\KhuyencaoController;
use App\Http\Controllers\MapController;
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

Route::get('/', [MapController::class, 'index']);
Route::post('/insert', [VungtrongController::class, 'insert'])->name('insert');;

// Bảng Bàng tư vấn
Route::get('/tuvan', [TuVanController::class, 'index']);
Route::post('/tuvan', [TuVanController::class, 'store']);
Route::put('/tuvan/{id}', [TuVanController::class, 'update']);
Route::delete('/tuvan/{id}', [TuVanController::class, 'destroy']);

// Cán bộ quản lý
Route::get('/canbo', [CanBoController::class, 'index']);
Route::post('/canbo', [CanBoController::class, 'store']);
Route::put('/canbo/{id}', [CanBoController::class, 'update']);
Route::delete('/canbo/{id}', [CanBoController::class, 'destroy']);

// Sản lượng
Route::get('/sanluong', [SanLuongController::class, 'index']);
Route::post('/sanluong', [SanLuongController::class, 'store']);
Route::put('/sanluong/{id}', [SanLuongController::class, 'update']);
Route::delete('/sanluong/{id}', [SanLuongController::class, 'destroy']);

// Sâu bệnh
Route::get('/saubenh', [SauBenhController::class, 'index'])->name('saubenh.index');
Route::post('/saubenh/store', [SauBenhController::class, 'store'])->name('saubenh.store');
Route::post('/saubenh/create', [SauBenhController::class, 'create']);
Route::put('/saubenh/{id}', [SauBenhController::class, 'update']);
Route::delete('/saubenh/{id}', [SauBenhController::class, 'delete']);

// Vùng trồng
Route::get('/vungtrong', [VungtrongController::class, 'index'])->name('vungtrong.index');
Route::post('/vungtrong/insert', [VungtrongController::class, 'insert'])->name('vungtrong.store');
Route::get('/vungtrong/delete/{id}', [VungtrongController::class, 'delete']);
Route::get('/vungtrong/update', [VungtrongController::class, 'update']);

Route::get('/khuyencao', [KhuyencaoController::class, 'index'])->name('khuyencao.index');
Route::get('/khuyencao/create', [KhuyencaoController::class, 'create'])->name('khuyencao.create');
Route::post('/khuyencao/store', [KhuyencaoController::class, 'store'])->name('khuyencao.store');
Route::get('/khuyencao/{idkhuyencao}/{idcanbo}/edit', [KhuyencaoController::class, 'edit'])->name('khuyencao.edit');
Route::put('/khuyencao/{idkhuyencao}/{idcanbo}', [KhuyencaoController::class, 'update'])->name('khuyencao.update');
Route::delete('/khuyencao/{idkhuyencao}/{idcanbo}', [KhuyencaoController::class, 'destroy'])->name('khuyencao.destroy');
