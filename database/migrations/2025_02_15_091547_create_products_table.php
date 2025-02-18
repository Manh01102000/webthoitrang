<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            // id admin nhập
            $table->integer('product_admin_id')->default('0');
            // Tên sản phẩm
            $table->string('product_name')->default('NULL');
            // Mô tả sản phẩm
            $table->string('product_description')->default('NULL');
            // Giá bán
            $table->integer('product_price')->default('0');
            // Loại sản phẩm (Áo, Quần, Giày, Túi xách, v.v.)
            $table->string('product_category')->default('NULL');
            // Thương hiệu
            $table->string('product_brand')->default('NULL');
            // Các kích cỡ có sẵn
            $table->string('product_sizes')->default('NULL');
            // Các màu có sẵn 
            $table->string('product_colors')->default('NULL');
            // Danh sách ảnh sản phẩm
            $table->string('product_images')->default('NULL');
            // Số lượng tồn kho
            $table->integer('product_stock')->default('0');
            // Ngày tạo
            $table->integer('product_create_time')->default('0');
            // Ngày cập nhật
            $table->integer('product_update_time')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
;
