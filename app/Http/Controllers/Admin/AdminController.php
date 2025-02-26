<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash; // ✅ Import Hash đúng
use App\Models\Admin; // Import model Admin

class AdminController extends Controller
{
    public function dashboard()
    {
        // kiểm tra xem có dùng thư viện hay không
        $dataversion = [
            'useslick' => 0,
            'useselect2' => 1,
        ];
        // 
        $domain = env('DOMAIN_WEB');
        // 
        $dataSeo = [
            'seo_title' => "Fashion Houses Admin – Quản Lý Cửa Hàng Thời Trang Hiệu Quả",
            'seo_desc' => "Fashion Houses Admin giúp bạn quản lý sản phẩm, đơn hàng và khách hàng một cách dễ dàng. Giao diện trực quan, báo cáo chi tiết, tối ưu hiệu suất kinh doanh.",
            'seo_keyword' => "Fashion Houses Admin, quản lý thời trang, quản lý đơn hàng, quản lý sản phẩm, hệ thống admin, phần mềm quản lý cửa hàng, bán hàng thời trang, quản lý khách hàng",
            'canonical' => $domain . '/admin/dashboard'
        ];
        // LÂY DỮ LIỆU
        $data = InForAccountAdmin(session('admin_id'));
        $dataAll = [
            'data' => $data,
        ];
        // Trả về view 'example'
        return view('admin.dashboard', [
            'dataSeo' => $dataSeo,
            'domain' => $domain,
            'dataversion' => $dataversion,
            'dataAll' => $dataAll,
            'active' => 1
        ]);
    }

    public function login()
    {
        // kiểm tra xem có dùng thư viện hay không
        $dataversion = [
            'useslick' => 0,
            'useselect2' => 1,
        ];
        // 
        $domain = env('DOMAIN_WEB');
        // 
        $dataSeo = [
            'seo_title' => "Đăng Nhập Quản Trị Viên - Fashion Houses",
            'seo_desc' => "Truy cập hệ thống quản trị Fashion Houses để quản lý sản phẩm, đơn hàng và tài khoản khách hàng. Đăng nhập ngay để bắt đầu điều hành cửa hàng thời trang của bạn!",
            'seo_keyword' => "Fashion Houses admin, đăng nhập quản trị, quản lý cửa hàng, đăng nhập admin Fashion Houses, quản lý sản phẩm, quản lý đơn hàng, hệ thống quản trị, trang quản lý thời trang.",
            'canonical' => $domain . '/admin/login'
        ];
        // Kiểm tra xem có cookie đăng nhập không nếu có thì về trang chủ
        if (session()->has('admin_id')) {
            return redirect("/admin/dashboard");
        }
        // 
        // LÂY DỮ LIỆU
        // Trả về view
        return view('admin.login', [
            'dataSeo' => $dataSeo,
            'domain' => $domain,
            'dataversion' => $dataversion,
        ]);
    }

    public function ManageAccountUser()
    {
        // kiểm tra xem có dùng thư viện hay không
        $dataversion = [
            'useslick' => 0,
            'useselect2' => 1,
        ];
        // 
        $domain = env('DOMAIN_WEB');
        // 
        $dataSeo = [
            'seo_title' => "Fashion Houses Admin – Danh Sách Người Dùng",
            'seo_desc' => "Fashion Houses Admin giúp bạn quản lý sản phẩm, đơn hàng và khách hàng một cách dễ dàng. Giao diện trực quan, báo cáo chi tiết, tối ưu hiệu suất kinh doanh.",
            'seo_keyword' => "Fashion Houses Admin, quản lý thời trang, quản lý đơn hàng, quản lý sản phẩm, hệ thống admin, phần mềm quản lý cửa hàng, bán hàng thời trang, quản lý khách hàng",
            'canonical' => $domain . '/admin/dashboard'
        ];
        // LÂY DỮ LIỆU
        $data = InForAccountAdmin(session('admin_id'));
        $dataAll = [
            'data' => $data,
        ];
        // Trả về view 'example'
        return view('admin.user_account.manage_account_user', [
            'dataSeo' => $dataSeo,
            'domain' => $domain,
            'dataversion' => $dataversion,
            'dataAll' => $dataAll,
            'active' => 3
        ]);
    }

    // Danh sach san pham
    public function ManageProduct()
    {
        // kiểm tra xem có dùng thư viện hay không
        $dataversion = [
            'useslick' => 0,
            'useselect2' => 1,
        ];
        // 
        $domain = env('DOMAIN_WEB');
        // 
        $dataSeo = [
            'seo_title' => "Fashion Houses Admin – Danh Sách Sản Phẩm",
            'seo_desc' => "Fashion Houses Admin giúp bạn quản lý sản phẩm, đơn hàng và khách hàng một cách dễ dàng. Giao diện trực quan, báo cáo chi tiết, tối ưu hiệu suất kinh doanh.",
            'seo_keyword' => "Fashion Houses Admin, quản lý thời trang, quản lý đơn hàng, quản lý sản phẩm, hệ thống admin, phần mềm quản lý cửa hàng, bán hàng thời trang, quản lý khách hàng",
            'canonical' => $domain . '/admin/dashboard'
        ];
        // LÂY DỮ LIỆU 
        // => ADMIN
        $data = InForAccountAdmin(session('admin_id'));
        // => Dữ liệu danh mục
        $categoryTree = getCategoryTree();
        // => Dữ liệu chung
        $dataAll = [
            'data' => $data,
            'Category' => $categoryTree,
        ];
        // Trả về view 'example'
        return view('admin.product.manage_product', [
            'dataSeo' => $dataSeo,
            'domain' => $domain,
            'dataversion' => $dataversion,
            'dataAll' => $dataAll,
            'active' => 6
        ]);
    }

    // Them san pham
    public function ManageAddProduct()
    {
        // kiểm tra xem có dùng thư viện hay không
        $dataversion = [
            'useslick' => 0,
            'useselect2' => 1,
        ];
        // 
        $domain = env('DOMAIN_WEB');
        // 
        $dataSeo = [
            'seo_title' => "Fashion Houses Admin – Thêm Mới Sản Phẩm",
            'seo_desc' => "Fashion Houses Admin giúp bạn quản lý sản phẩm, đơn hàng và khách hàng một cách dễ dàng. Giao diện trực quan, báo cáo chi tiết, tối ưu hiệu suất kinh doanh.",
            'seo_keyword' => "Fashion Houses Admin, quản lý thời trang, quản lý đơn hàng, quản lý sản phẩm, hệ thống admin, phần mềm quản lý cửa hàng, bán hàng thời trang, quản lý khách hàng",
            'canonical' => $domain . '/admin/dashboard'
        ];
        // LÂY DỮ LIỆU
        $data = InForAccountAdmin(session('admin_id'));
        // => Dữ liệu danh mục
        $categoryTree = getCategoryTree();
        $product_sizes = productSizes();
        $dataAll = [
            'data' => $data,
            'Category' => $categoryTree,
            'product_sizes' => $product_sizes
        ];
        // Trả về view 'example'
        return view('admin.product.manage_add_product', [
            'dataSeo' => $dataSeo,
            'domain' => $domain,
            'dataversion' => $dataversion,
            'dataAll' => $dataAll,
            'active' => 6
        ]);
    }
}
