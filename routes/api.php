<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;

// AJAX
// API kiểm tra tài khoản tồn tại
Route::post('/check_account_register', [RegisterController::class, 'CheckAccountRegister']);
// Đăng ký tài khoản
Route::post('/AccountRegister', [RegisterController::class, 'AccountRegister']);