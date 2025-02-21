<?php
// =================================================
use Illuminate\Support\Facades\Route;
// ==================Controller===============================
// Trang chủ
use App\Http\Controllers\HomeController;
// Đăng ký
use App\Http\Controllers\RegisterController;
// Đăng nhập
use App\Http\Controllers\LoginController;
// Đăng xuất
use App\Http\Controllers\LogoutController;
// Trang chủ tin tức
use App\Http\Controllers\NewsController;
// Liên hệ
use App\Http\Controllers\ContactController;
// Giỏ hàng
use App\Http\Controllers\CartController;
// Giỏ hàng
use App\Http\Controllers\ConfirmOrderController;
// ==================Route===============================
// Trang chủ
Route::get('/', [HomeController::class, 'Home']);
// Đăng ký
Route::get('/dang-ky-tai-khoan', [RegisterController::class, 'index']);
// Đăng nhập
Route::get('/dang-nhap-tai-khoan', [LoginController::class, 'index']);
// Đăng xuất
Route::get('/dang-xuat', [LogoutController::class, 'index']);
// Trang chủ tin tức
Route::get('/tin-tuc', [NewsController::class, 'index']);
// Liên hệ
Route::get('/lien-he', [ContactController::class, 'index']);
// Giỏ hàng
Route::get('/gio-hang', [CartController::class, 'index']);
// Giỏ hàng
Route::get('/xac-nhan-don-hang', [ConfirmOrderController::class, 'index']);
// test 
Route::get("/test", function () {
    return view('test');
});