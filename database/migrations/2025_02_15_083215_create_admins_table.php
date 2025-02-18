<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('admin_id');
            $table->string('admin_name');
            $table->integer('admin_role');
            $table->string('admin_mail_account')->default('NULL');
            $table->string('admin_phone_account')->default('NULL');
            $table->string('admin_phone')->default('NULL');
            $table->string('admin_email_contact')->default('NULL');
            $table->string('admin_pass')->default('NULL');
            $table->integer('admin_city')->default('0');
            $table->integer('admin_district')->default('0');
            $table->string('address')->default('NULL');
            $table->string('admin_logo')->default('NULL');
            $table->integer('birthday')->default('0');
            $table->integer('gender')->default('0');
            $table->integer('admin_honnhan')->default('0');
            $table->integer('admin_create_time')->default('0');
            $table->integer('admin_update_time')->default('0');
            $table->integer('admin_show')->default('0');
            $table->integer('admin_ip_address')->default('0');
            $table->string('admin_lat')->default('NULL');
            $table->string('admin_long')->default('NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
