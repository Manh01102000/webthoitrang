<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('cat_id');
            $table->string('cat_name')->default('NULL');
            $table->string('cat_alias')->default('NULL');
            $table->string('cat_tags')->default('NULL');
            $table->string('cat_title')->default('NULL');
            $table->string('cat_description')->default('NULL');
            $table->string('cat_keyword')->default('NULL');
            $table->integer('cat_code')->default('0');
            $table->integer('cat_parent_code')->default('0');
            $table->integer('cat_count')->default('0');
            $table->integer('cat_order')->default('0');
            $table->integer('cat_active')->default('1');
            $table->integer('cat_hot')->default('0');
            $table->string('cat_img')->default('NULL');
            $table->string('cat_301')->default('NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
}
;
