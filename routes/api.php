<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// API
use App\Http\Controllers\ApiController;
// 

// AJAX
// API kiểm tra tài khoản tồn tại
Route::post('/check_account_register', [RegisterController::class, 'CheckAccountRegister']);
// Đăng ký tài khoản
Route::post('/AccountRegister', [RegisterController::class, 'AccountRegister']);
// Đăng nhập tài khoản
Route::post('/Accountlogin', [LoginController::class, 'Accountlogin']);
// Đăng nhập tài khoản
Route::post('/Accountlogin', [LoginController::class, 'Accountlogin']);

// API lấy dữ liệu tỉnh thành từ ID
// Xóa cache
Route::post('/clearCache', [ApiController::class, 'clearCache']);
// Lấy tỉnh thành
Route::post('/getCities', [ApiController::class, 'getCities']);
// Lấy quận huyên không theo id
Route::post('/getDistrics', [ApiController::class, 'getDistrics']);
// Lấy xã phường không theo id
Route::post('/getCommunes', [ApiController::class, 'getCommunes']);
// Lấy quận huyện theo id
Route::post('/getDistricsByID', [ApiController::class, 'getDistricsByID']);
// lấy xã phường theo id
Route::post('/getCommunesByID', [ApiController::class, 'getCommunesByID']);