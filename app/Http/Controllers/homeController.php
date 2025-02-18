<?php

namespace App\Http\Controllers;
use App\Models\User; // Import Model User
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        // kiểm tra xem có dùng thư viện hay không
        $dataversion = [
            'useslick' => 0,
            'useselect2' => 1,
        ];
        // SEO 
        $domain = env('DOMAIN_WEB');
        $dataSeo = [
            'seo_title' => "Fashion Houses – Shop Quần Áo Thời Trang Cao Cấp | Mới Nhất " . date('Y'),
            'seo_desc' => "Tạo tài khoản Fashion Houses ngay hôm nay để nhận ưu đãi độc quyền, cập nhật xu hướng thời trang mới nhất và mua sắm dễ dàng hơn. Đăng ký miễn phí!",
            'seo_keyword' => "đăng ký tài khoản, Fashion Houses, tạo tài khoản mua sắm, thời trang trực tuyến, shop quần áo online, ưu đãi thời trang, xu hướng thời trang",
            'canonical' => $domain
        ];
        // LÂY DỮ LIỆU NGƯỜI DÙNG
        $data = User::all();
        // Trả về view 'example'
        return view('home', [
            'dataSeo' => $dataSeo,
            'domain' => $domain,
            'dataversion' => $dataversion,
            'data2' => $data,
        ]);
    }
}