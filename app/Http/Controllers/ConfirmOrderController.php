<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\cart;
use App\Models\city;
use App\Models\distric;
use App\Models\commune;

class ConfirmOrderController extends Controller
{
    public function index()
    {
        // =======kiểm tra xem có dùng thư viện hay không==================
        $dataversion = [
            'useslick' => 0,
            'useselect2' => 1,
        ];
        // =====================LÂY DỮ LIỆU=================================

        // Lấy dữ liệu city
        $cities = Cache::rememberForever('cities', function () {
            return City::all()->toArray();
        });
        // Lấy dữ quận huyện
        $districs = distric::all()->toArray();
        // Lấy dữ xã phường
        $communes = commune::all()->toArray();
        // 
        // LÂY DỮ LIỆU
        $data = InForAccount();
        $categoryTree = getCategoryTree();
        // toàn bộ dữ liệu
        $dataAll = [
            'data' => $data,
            'Category' => $categoryTree,
            'datacity' => $cities,
            'datadistrict' => $districs,
            'datacommune' => $communes,
        ];
        // =====================LÂY DỮ LIỆU=======================

        // ========================SEO============================
        $domain = env('DOMAIN_WEB');
        $dataSeo = [
            'seo_title' => "Xác Nhận Đơn Hàng - Fashion Houses",
            'seo_desc' => "Cảm ơn bạn đã đặt hàng tại Fashion Houses! Kiểm tra chi tiết đơn hàng và xác nhận giao dịch thành công. Chúng tôi sẽ sớm giao hàng đến bạn.",
            'seo_keyword' => "Fashion Houses xác nhận đơn hàng, đơn hàng thành công, trạng thái đơn hàng, theo dõi đơn hàng, mua sắm thời trang, đơn hàng Fashion Houses, giao dịch thành công, thời trang cao cấp.",
            'canonical' => $domain . '/xac-nhan-don-hang',
        ];
        // ===================Trả về view========================
        return view('confirmOrder', [
            'dataSeo' => $dataSeo,
            'domain' => $domain,
            'dataversion' => $dataversion,
            'dataAll' => $dataAll,
        ]);
    }
}
