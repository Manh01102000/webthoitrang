<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('use_id');
            // Tên user
            $table->string('use_name')->default('NULL');
            // Quyền truy cập
            $table->integer('use_role')->default('0');
            // Email tài khoản
            $table->string('use_mail_account')->default('NULL');
            // Số điện thoại tài khoản (nếu có)
            $table->string('use_phone_account')->default('NULL');
            // Số điện thoại liên hệ
            $table->string('use_phone')->default('NULL');
            // Email liên hệ
            $table->string('use_email_contact')->default('NULL');
            // Mật khẩu tài khoản
            $table->string('use_pass')->default('NULL');
            // Tài khoản xác thực
            $table->integer('use_authentic')->default('0');
            // Mã OTP
            $table->integer('use_otp')->default('0');
            // Đăng nhập
            $table->integer('is_login')->default('0');
            // Thời gian đăng nhập
            $table->integer('last_login')->default('0');
            // Tỉnh thành 
            $table->integer('use_city')->default('0');
            // Quận huyện
            $table->integer('use_district')->default('0');
            // Địa chỉ
            $table->string('address')->default('NULL');
            // Ảnh đại diện
            $table->string('use_logo')->default('NULL');
            // Ngày sinh
            $table->integer('birthday')->default('0');
            // Giới tính
            $table->integer('gender')->default('0');
            // Hôn nhân
            $table->integer('use_honnhan')->default('0');
            // Lượt xem tài khoản
            $table->integer('use_view_count')->default('0');
            // Thời gian tạo tài khoản
            $table->integer('use_create_time')->default('0');
            // Cập nhật thời gian tài khoản
            $table->integer('use_update_time')->default('0');
            // Đánh dấu ẩn hiện tài khoản
            $table->integer('use_show')->default('0');
            // Địa chỉ IP
            $table->integer('use_ip_address')->default('0');
            // Lat
            $table->string('use_lat')->default('NULL');
            // Long
            $table->string('use_long')->default('NULL');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
