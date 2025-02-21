<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\city;
use App\Models\distric;
use App\Models\commune;
use App\Models\category;

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

            // =========Lấy dữ liệu mới===========

            // Bảng city
            $cities = city::all()->toArray();
            // Bảng danh mục
            $category = category::all()->toArray();
            // ====Ghi vào cache với thời gian lưu trữ (ví dụ: 12 giờ)===
            // Cache::put('cities', $cities, now()->addHours(12));

            // ====Ghi vào cache với thời gian lưu trữ (ví dụ: 7 ngày)======
            // Cache::put('cities', $cities, now()->addDays(7));

            // =====Ghi vào cache với thời gian vĩnh viễn=====
            // ghi cache bảng city
            Cache::forever('cities', $cities);
            // ghi cache bảng danh mục
            Cache::forever('category', $category);

            return response()->json([
                'status' => 'success',
                'message' => 'Cache cleared and updated successfully',
                'cache_status' => [
                    'cities' => Cache::has('cities'),
                    'category' => Cache::has('category'),
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
}
