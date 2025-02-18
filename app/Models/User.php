<?php

namespace App\Models;

// HasFactory	    Hỗ trợ tạo dữ liệu giả bằng Factory.
// Authenticatable	Cho phép Model User hoạt động với hệ thống đăng nhập Laravel.
// Notifiable	    Cho phép Model User nhận thông báo qua email, Slack, hoặc database.

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // Tên bảng trong database

    protected $fillable = ['name', 'email', 'password']; // Các cột có thể gán dữ liệu hàng loạt

    protected $hidden = ['password', 'remember_token']; // Các cột ẩn khi trả về JSON

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
