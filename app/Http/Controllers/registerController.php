<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    public function index()
    {
        // kiểm tra xem có dùng thư viện hay không
        $dataversion = [
            'useslick' => 0,
            'useselect2' => 1,
        ];
        $domain = env('DOMAIN_WEB');
        $dataSeo = [
            'seo_title' => "Đăng Ký Tài Khoản | Fashion Houses - Mua Sắm Thời Trang Đẳng Cấp",
            'seo_desc' => "Tạo tài khoản Fashion Houses ngay hôm nay để nhận ưu đãi độc quyền, cập nhật xu hướng thời trang mới nhất và mua sắm dễ dàng hơn. Đăng ký miễn phí!",
            'seo_keyword' => "đăng ký tài khoản, Fashion Houses, tạo tài khoản mua sắm, thời trang trực tuyến, shop quần áo online, ưu đãi thời trang, xu hướng thời trang",
            'canonical' => $domain . '/dang-ky-tai-khoan'
        ];
        return view('register', [
            'dataSeo' => $dataSeo,
            'domain' => $domain,
            'dataversion' => $dataversion,
        ]);
    }
}