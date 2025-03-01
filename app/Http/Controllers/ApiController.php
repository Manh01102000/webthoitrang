<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\city;
use App\Models\distric;
use App\Models\commune;
use App\Models\category;
use App\Models\product;

class ApiController extends Controller
{
    public function clearCache(Request $request)
    {
        if (!$request->has('clearcache')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Missing parameter: clearcache'
            ], 400);
        }

        try {
            // Xóa cache cũ
            Cache::forget('cities');
            Cache::forget('category');
            Cache::forget('top_products');
            Cache::forget('new_products');
            Cache::forget('hot_deal_products');
            Cache::forget('flash_sale_products');

            // =========Lấy dữ liệu mới===========

            // Bảng city
            $cities = city::all()->toArray();
            // Bảng danh mục
            $category = category::all()->toArray();
            // Sản phẩm bán chạy
            $topProducts = Product::leftJoin('manage_discounts', 'products.product_code', '=', 'manage_discounts.discount_product_code')
                ->where('products.product_active', 1)
                ->where(function ($query) {
                    $query->where('manage_discounts.discount_active', 1)
                        ->orWhereNull('manage_discounts.discount_active'); // Nếu không có giảm giá thì vẫn giữ lại sản phẩm
                })
                ->select(
                    'products.product_code',
                    'products.product_name',
                    'products.product_create_time',
                    'products.product_brand',
                    'products.product_sizes',
                    'products.product_colors',
                    'products.product_classification',
                    'products.product_stock',
                    'products.product_price',
                    'products.product_images',
                    'manage_discounts.discount_product_code',
                    'manage_discounts.discount_active',
                    'manage_discounts.discount_type',
                    'manage_discounts.discount_start_time',
                    'manage_discounts.discount_end_time',
                    'manage_discounts.discount_price',

                )->orderByDesc('product_sold')
                ->limit(12)
                ->get()->toArray();

            // Sản phẩm mới về
            $newProducts = Product::leftJoin('manage_discounts', 'products.product_code', '=', 'manage_discounts.discount_product_code')
                ->where('products.product_active', 1)
                ->where(function ($query) {
                    $query->where('manage_discounts.discount_active', 1)
                        ->orWhereNull('manage_discounts.discount_active'); // Nếu không có giảm giá thì vẫn giữ lại sản phẩm
                })
                ->select(
                    'products.product_code',
                    'products.product_name',
                    'products.product_create_time',
                    'products.product_brand',
                    'products.product_sizes',
                    'products.product_colors',
                    'products.product_classification',
                    'products.product_stock',
                    'products.product_price',
                    'products.product_images',
                    'manage_discounts.discount_product_code',
                    'manage_discounts.discount_active',
                    'manage_discounts.discount_type',
                    'manage_discounts.discount_start_time',
                    'manage_discounts.discount_end_time',
                    'manage_discounts.discount_price',

                )->orderByDesc('product_create_time')
                ->limit(12)
                ->get()->toArray();

            // Sản phẩm giảm giá sốc
            $hotDealProducts = Product::join('manage_discounts', 'products.product_code', '=', 'manage_discounts.discount_product_code')
                ->where('products.product_active', 1)
                ->where('manage_discounts.discount_active', 1)
                ->select(
                    'products.product_code',
                    'products.product_name',
                    'products.product_create_time',
                    'products.product_brand',
                    'products.product_sizes',
                    'products.product_colors',
                    'products.product_classification',
                    'products.product_stock',
                    'products.product_price',
                    'products.product_images',
                    'manage_discounts.discount_product_code',
                    'manage_discounts.discount_active',
                    'manage_discounts.discount_type',
                    'manage_discounts.discount_start_time',
                    'manage_discounts.discount_end_time',
                    'manage_discounts.discount_price',

                ) // Chỉ lấy dữ liệu cần dùng
                ->orderByDesc('manage_discounts.discount_price')
                ->limit(12)
                ->get()->toArray();

            // Sản phẩm Flash Sale
            $flashSaleProducts = Product::join('manage_discounts', 'products.product_code', '=', 'manage_discounts.discount_product_code')
                ->where('products.product_active', 1)
                ->where('manage_discounts.discount_active', 1)
                ->where('manage_discounts.discount_start_time', '<=', now())
                ->where('manage_discounts.discount_end_time', '>=', now())
                ->select(
                    'products.product_code',
                    'products.product_name',
                    'products.product_create_time',
                    'products.product_brand',
                    'products.product_sizes',
                    'products.product_colors',
                    'products.product_classification',
                    'products.product_stock',
                    'products.product_price',
                    'products.product_images',
                    'manage_discounts.discount_product_code',
                    'manage_discounts.discount_active',
                    'manage_discounts.discount_type',
                    'manage_discounts.discount_start_time',
                    'manage_discounts.discount_end_time',
                    'manage_discounts.discount_price',
                ) // Chỉ lấy dữ liệu cần dùng
                ->orderByDesc('manage_discounts.discount_price')
                ->limit(12)
                ->get()
                ->toArray();

            // Nếu **KHÔNG** có sản phẩm Flash Sale, lấy sản phẩm giảm giá nhiều nhất
            if (empty($flashSaleProducts)) {
                $flashSaleProducts = Product::join('manage_discounts', 'products.product_code', '=', 'manage_discounts.discount_product_code')
                    ->where('products.product_active', 1)
                    ->where('manage_discounts.discount_active', 1)
                    ->select(
                        'products.product_code',
                        'products.product_name',
                        'products.product_create_time',
                        'products.product_brand',
                        'products.product_sizes',
                        'products.product_colors',
                        'products.product_classification',
                        'products.product_stock',
                        'products.product_price',
                        'products.product_images',
                        'manage_discounts.discount_product_code',
                        'manage_discounts.discount_active',
                        'manage_discounts.discount_type',
                        'manage_discounts.discount_start_time',
                        'manage_discounts.discount_end_time',
                        'manage_discounts.discount_price',
                    ) // Chỉ lấy dữ liệu cần dùng
                    ->orderByDesc('manage_discounts.discount_price')
                    ->limit(12)
                    ->get()
                    ->toArray();
            }


            // ====Ghi vào cache với thời gian lưu trữ (ví dụ: vĩnh viễn)===
            Cache::forever('cities', $cities);
            Cache::forever('category', $category);
            Cache::forever('top_products', $topProducts);
            Cache::forever('new_products', $newProducts);
            Cache::forever('hot_deal_products', $hotDealProducts);
            Cache::forever('flash_sale_products', $flashSaleProducts);

            return response()->json([
                'status' => 'success',
                'message' => 'Cache cleared and updated successfully',
                'cache_status' => [
                    'cities' => Cache::has('cities'),
                    'category' => Cache::has('category'),
                    'top_products' => Cache::has('top_products'),
                    'new_products' => Cache::has('new_products'),
                    'hot_deal_products' => Cache::has('hot_deal_products'),
                    'flash_sale_products' => Cache::has('flash_sale_products'),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update cache',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // Lấy dữ liệu getCities (tỉnh/thành)
    public function getCities()
    {
        if (!Cache::has('cities')) {
            $cities = city::all()->toArray(); // Lấy dữ liệu từ DB
            Cache::forever('cities', $cities); // Lưu vào file cache
        }

        return Cache::get('cities'); // Lấy dữ liệu từ cache
    }

    // Lấy dữ liệu getDistrics (quận/huyện)
    public function getDistrics()
    {
        $districts = distric::all()->toArray();
        return response()->json($districts);
    }

    // Lấy dữ liệu getCommunes (xã/phường)
    public function getCommunes()
    {
        $communes = commune::all()->toArray();
        return response()->json($communes);
    }

    // lay quan huyen theo id tinh thanh
    public function getDistricsByID(Request $request)
    {
        $id = $request->get('id');

        if (!$id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Thiếu ID Tỉnh/Thành phố'
            ], 400);
        }

        // lấy dữ liệu từ base
        $districts = distric::where('city_parents', $id)->get()->toArray();

        return response()->json([
            'status' => 'success',
            'data' => $districts
        ]);
    }

    // lay xa phuong theo id quan huyen
    public function getCommunesByID(Request $request)
    {
        $id = $request->get('id');

        if (!$id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Thiếu ID Quận/Huyện'
            ], 400);
        }

        // lấy dữ liệu từ base
        $communes = commune::where('district_parents', $id)->get()->toArray();

        return response()->json([
            'status' => 'success',
            'data' => $communes
        ]);
    }

    // lay danh muc con theo id cha
    public function getCategoryByID(Request $request)
    {
        $id = $request->get('id');

        if (!$id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Thiếu ID Danh mục'
            ], 400);
        }

        // lấy dữ liệu từ base
        $category = category::where('cat_parent_code', $id)->get()->toArray();

        return response()->json([
            'status' => 'success',
            'data' => $category
        ]);
    }
}
