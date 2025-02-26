<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash; // ✅ Import Hash đúng
use App\Models\Admin; // Import model Admin

class APIController extends Controller
{
    public function Adminlogin(Request $request)
    {
        $data_mess = [
            'result' => false,
            'data' => '',
            'message' => "Thiếu dữ liệu truyền lên",
        ];
        $admin_account = $request->get('admin_account');
        $admin_password = $request->get('admin_password');
        if (
            isset($admin_account) && $admin_account != "" &&
            isset($admin_password) && $admin_password != ""
        ) {
            $check = Admin::where([
                ['admin_account', '=', $admin_account],
                ['admin_pass', '=', md5($admin_password)],
            ])
                ->get()
                ->first();

            if ($check) { // Kiểm tra xem Collection có rỗng không
                $cookie_last_id = $check->admin_id;  // Lấy ID của user
                $cookie_ut = $check->admin_type; // Giá trị tùy chỉnh của bạn
                $admin_show = $check->admin_show; // Giá trị tùy chỉnh của bạn
                // Lưu vào session
                session()->put('admin_id', $cookie_last_id);
                session()->put('admin_type', $cookie_ut);
                session()->put('admin_show', $admin_show);
                // Trả về dữ liệu thành công
                $data_mess = [
                    'result' => true,
                    'data' => $check,  // Trả về đối tượng user đầu tiên
                    'message' => "Đăng nhập tài khoản thành công",
                ];
            } else {
                // Trả về thông báo lỗi nếu không tìm thấy
                $data_mess = [
                    'result' => false,
                    'data' => [],
                    'message' => "Tài khoản hoặc mật khẩu không chính xác",
                ];
            }
        }
        return json_encode($data_mess, JSON_UNESCAPED_UNICODE);
    }
    // API THÊM SẢN PHẨM
    public function CreateProduct(Request $request)
    {
        $data_mess = [
            'result' => false,
            'data' => '',
            'message' => "Thiếu dữ liệu truyền lên",
        ];
        $admin_account = $request->get('admin_account');
        $admin_password = $request->get('admin_password');
        if (
            isset($admin_account) && $admin_account != "" &&
            isset($admin_password) && $admin_password != ""
        ) {
            $check = Admin::where([
                ['admin_account', '=', $admin_account],
                ['admin_pass', '=', md5($admin_password)],
            ])
                ->get()
                ->first();

            if ($check) { // Kiểm tra xem Collection có rỗng không
                $cookie_last_id = $check->admin_id;  // Lấy ID của user
                $cookie_ut = $check->admin_type; // Giá trị tùy chỉnh của bạn
                $admin_show = $check->admin_show; // Giá trị tùy chỉnh của bạn
                // Lưu vào session
                session()->put('admin_id', $cookie_last_id);
                session()->put('admin_type', $cookie_ut);
                session()->put('admin_show', $admin_show);
                // Trả về dữ liệu thành công
                $data_mess = [
                    'result' => true,
                    'data' => $check,  // Trả về đối tượng user đầu tiên
                    'message' => "Đăng nhập tài khoản thành công",
                ];
            } else {
                // Trả về thông báo lỗi nếu không tìm thấy
                $data_mess = [
                    'result' => false,
                    'data' => [],
                    'message' => "Tài khoản hoặc mật khẩu không chính xác",
                ];
            }
        }
        return json_encode($data_mess, JSON_UNESCAPED_UNICODE);
    }
    // API CẬP NHẬT SẢN PHẨM
    public function UpdateProduct(Request $request)
    {
        $data_mess = [
            'result' => false,
            'data' => '',
            'message' => "Thiếu dữ liệu truyền lên",
        ];
        $admin_account = $request->get('admin_account');
        $admin_password = $request->get('admin_password');
        if (
            isset($admin_account) && $admin_account != "" &&
            isset($admin_password) && $admin_password != ""
        ) {
            $check = Admin::where([
                ['admin_account', '=', $admin_account],
                ['admin_pass', '=', md5($admin_password)],
            ])
                ->get()
                ->first();

            if ($check) { // Kiểm tra xem Collection có rỗng không
                $cookie_last_id = $check->admin_id;  // Lấy ID của user
                $cookie_ut = $check->admin_type; // Giá trị tùy chỉnh của bạn
                $admin_show = $check->admin_show; // Giá trị tùy chỉnh của bạn
                // Lưu vào session
                session()->put('admin_id', $cookie_last_id);
                session()->put('admin_type', $cookie_ut);
                session()->put('admin_show', $admin_show);
                // Trả về dữ liệu thành công
                $data_mess = [
                    'result' => true,
                    'data' => $check,  // Trả về đối tượng user đầu tiên
                    'message' => "Đăng nhập tài khoản thành công",
                ];
            } else {
                // Trả về thông báo lỗi nếu không tìm thấy
                $data_mess = [
                    'result' => false,
                    'data' => [],
                    'message' => "Tài khoản hoặc mật khẩu không chính xác",
                ];
            }
        }
        return json_encode($data_mess, JSON_UNESCAPED_UNICODE);
    }
    // API XÓA SẢN PHẨM
    public function DeleteProduct(Request $request)
    {
        $data_mess = [
            'result' => false,
            'data' => '',
            'message' => "Thiếu dữ liệu truyền lên",
        ];
        $admin_account = $request->get('admin_account');
        $admin_password = $request->get('admin_password');
        if (
            isset($admin_account) && $admin_account != "" &&
            isset($admin_password) && $admin_password != ""
        ) {
            $check = Admin::where([
                ['admin_account', '=', $admin_account],
                ['admin_pass', '=', md5($admin_password)],
            ])
                ->get()
                ->first();

            if ($check) { // Kiểm tra xem Collection có rỗng không
                $cookie_last_id = $check->admin_id;  // Lấy ID của user
                $cookie_ut = $check->admin_type; // Giá trị tùy chỉnh của bạn
                $admin_show = $check->admin_show; // Giá trị tùy chỉnh của bạn
                // Lưu vào session
                session()->put('admin_id', $cookie_last_id);
                session()->put('admin_type', $cookie_ut);
                session()->put('admin_show', $admin_show);
                // Trả về dữ liệu thành công
                $data_mess = [
                    'result' => true,
                    'data' => $check,  // Trả về đối tượng user đầu tiên
                    'message' => "Đăng nhập tài khoản thành công",
                ];
            } else {
                // Trả về thông báo lỗi nếu không tìm thấy
                $data_mess = [
                    'result' => false,
                    'data' => [],
                    'message' => "Tài khoản hoặc mật khẩu không chính xác",
                ];
            }
        }
        return json_encode($data_mess, JSON_UNESCAPED_UNICODE);
    }
    // API ACTIVE SẢN PHẨM
    public function ActiveProduct(Request $request)
    {
        $data_mess = [
            'result' => false,
            'data' => '',
            'message' => "Thiếu dữ liệu truyền lên",
        ];
        $admin_account = $request->get('admin_account');
        $admin_password = $request->get('admin_password');
        if (
            isset($admin_account) && $admin_account != "" &&
            isset($admin_password) && $admin_password != ""
        ) {
            $check = Admin::where([
                ['admin_account', '=', $admin_account],
                ['admin_pass', '=', md5($admin_password)],
            ])
                ->get()
                ->first();

            if ($check) { // Kiểm tra xem Collection có rỗng không
                $cookie_last_id = $check->admin_id;  // Lấy ID của user
                $cookie_ut = $check->admin_type; // Giá trị tùy chỉnh của bạn
                $admin_show = $check->admin_show; // Giá trị tùy chỉnh của bạn
                // Lưu vào session
                session()->put('admin_id', $cookie_last_id);
                session()->put('admin_type', $cookie_ut);
                session()->put('admin_show', $admin_show);
                // Trả về dữ liệu thành công
                $data_mess = [
                    'result' => true,
                    'data' => $check,  // Trả về đối tượng user đầu tiên
                    'message' => "Đăng nhập tài khoản thành công",
                ];
            } else {
                // Trả về thông báo lỗi nếu không tìm thấy
                $data_mess = [
                    'result' => false,
                    'data' => [],
                    'message' => "Tài khoản hoặc mật khẩu không chính xác",
                ];
            }
        }
        return json_encode($data_mess, JSON_UNESCAPED_UNICODE);
    }
}
