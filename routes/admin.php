<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;

Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);
});