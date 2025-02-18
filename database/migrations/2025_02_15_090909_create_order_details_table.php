<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Mã order
            $table->integer('order_id')->default('0');
            // id sản phẩm
            $table->string('product_id')->default('NULL');
            // Loại sản phẩm
            $table->string('product_type')->default('NULL');
            // số lượng sản phẩm theo từng dịch vụ
            $table->string('amount_service')->default('NULL');
            // Ngày tạo đơn hàng
            $table->integer('created_at')->default('0');
            // Ngày kết thúc đơn hàng
            $table->integer('updated_at')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
}
;
