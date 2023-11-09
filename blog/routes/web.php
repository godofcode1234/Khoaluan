<?php

use App\Http\Controllers\VungtrongController;
use App\Http\Controllers\SauBenhController;
use App\Http\Controllers\KhuyencaoController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\CanboController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [MapController::class, 'create']);
// Route::post('/map', [MapController::class, 'index'])->name('map.index');
Auth::routes();
Route::post('/map/store', [MapController::class, 'store'])->name('map.store');
// Bảng Bàng tư vấn
Route::get('/tuvan', [TuVanController::class, 'index']);
Route::post('/tuvan', [TuVanController::class, 'store']);
Route::put('/tuvan/{id}', [TuVanController::class, 'update']);
Route::delete('/tuvan/{id}', [TuVanController::class, 'destroy']);

// Cán bộ quản lý
Route::get('/canbo', [CanBoController::class, 'index'])->name('canbo.index');
Route::post('/canbo', [CanBoController::class, 'store'])->name('canbo.store');
Route::put('/canbo/{id}', [CanBoController::class, 'update'])->name('canbo.update');
Route::delete('/canbo/{id}', [CanBoController::class, 'destroy'])->name('canbo.destroy');

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
Route::get('/getid', [VungtrongController::class, 'getId']);
Route::get('/vungtrong', [VungtrongController::class, 'index'])->name('vungtrong.index');
Route::post('/sinsert/ok', [VungtrongController::class, 'insert'])->name('vungtrong.store');
Route::delete('/vungtrong/{id}', [VungtrongController::class, 'delete']);
Route::get('/vungtrong/update/{id}', [VungtrongController::class, 'edit']);

Route::get('/khuyencao', [KhuyencaoController::class, 'index'])->name('khuyencao.index');
Route::get('/khuyencao/create', [KhuyencaoController::class, 'create'])->name('khuyencao.create');
Route::post('/khuyencao/store', [KhuyencaoController::class, 'store'])->name('khuyencao.store');
Route::get('/khuyencao/{idkhuyencao}/{idcanbo}/edit', [KhuyencaoController::class, 'edit'])->name('khuyencao.edit');
Route::put('/khuyencao/{idkhuyencao}/{idcanbo}', [KhuyencaoController::class, 'update'])->name('khuyencao.update');
Route::delete('/khuyencao/{idkhuyencao}/{idcanbo}', [KhuyencaoController::class, 'destroy'])->name('khuyencao.destroy');

Route::get('/home', [HomeController::class, 'index'])->name('home');
