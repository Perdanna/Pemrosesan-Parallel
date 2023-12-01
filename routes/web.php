<?php

use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('upload-file');
});

Route::get('/upload', [PenjualanController::class, 'index']);
Route::post('/upload', [PenjualanController::class, 'upload']);
Route::get('/store-data', [PenjualanController::class, 'store']);