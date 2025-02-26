<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory; // kích hoạt factory cho model
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'product_admin_id',
        'product_code',
        'product_name',
        'product_description',
        'product_price',
        'product_unit',
        'product_active',
        'category',
        'category_code',
        'category_children_code',
        'product_brand',
        'product_sizes',
        'product_colors',
        'product_code_colors',
        'product_images',
        'product_videos',
        'product_stock',
        'product_ship',
        'product_feeship',
        'product_create_time',
        'product_update_time',
    ];
}
