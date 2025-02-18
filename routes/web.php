<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class, 'Home']);
Route::get('/dang-ky-tai-khoan', [RegisterController::class, 'index']);