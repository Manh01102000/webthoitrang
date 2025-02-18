<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->bigIncrements('blog_id');
            // id admin
            $table->integer('blog_admin_id')->default('0');
            // Tiêu đề bài viết
            $table->string('blog_title')->default('NULL');
            // danh mục bài viết
            $table->integer('blog_cate')->default('0');
            // Nội dung bài viết
            $table->string('blog_content')->default('NULL');
            // seo title
            $table->string('blog_meta_title')->default('NULL');
            // seo des
            $table->string('blog_meta_description')->default('NULL');
            // Các từ khóa liên quan
            $table->string('blog_tags')->default('NULL');
            // Thời gian tạo bài viết
            $table->integer('blog_create_time')->default('0');
            // Thời gian cập nhật bài viết
            $table->integer('blog_update_time')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
