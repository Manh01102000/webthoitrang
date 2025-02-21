<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;

class CartController extends Controller
{
    public function index()
    {
        // kiểm tra xem có dùng thư viện hay không
        $dataversion = [
            'useslick' => 0,
            'useselect2' => 1,
        ];
        // SEO 
        $domain = env('DOMAIN_WEB');
        $dataSeo = [
            'seo_title' => "Giỏ Hàng Của Bạn - Fashion Houses",
            'seo_desc' => "Xem lại các sản phẩm thời trang trong giỏ hàng của bạn tại Fashion Houses. Hoàn tất đơn hàng để sở hữu những thiết kế mới nhất từ các nhà mốt hàng đầu!",
            'seo_keyword' => "Fashion Houses giỏ hàng, sản phẩm thời trang, mua sắm thời trang, thanh toán đơn hàng, thời trang cao cấp, giỏ hàng trực tuyến, xu hướng thời trang, đặt hàng thời trang.",
            'canonical' => $domain . '/gio-hang',
        ];
        // LÂY DỮ LIỆU
        $data = InForAccount();
        $categoryTree = getCategoryTree();
        $dataAll = [
            'data' => $data,
            'Category' => $categoryTree,
            'datacity' => '',
            'datadistrict' => '',
            'datacommune' => '',
        ];
        // Trả về view 'example'
        return view('cart', [
            'dataSeo' => $dataSeo,
            'domain' => $domain,
            'dataversion' => $dataversion,
            'dataAll' => $dataAll,
        ]);
    }
}
