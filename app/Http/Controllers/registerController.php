<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function CheckAccountRegister(Request $request)
    {
        $data_mess = [
            'result' => false,
            'data' => '',
            'message' => "Có lỗi xảy ra",
        ];
        $account_check = $request->get('account_check');
        if (isset($account_check) && $account_check != "") {
            $check = DB::table('users')
                ->where('users.use_mail_account', $account_check)
                ->select('users.*')
                ->get();
            $data_mess = [
                'result' => true,
                'data' => ($check->count() > 0) ? 1 : 0,
                'message' => "Lấy dữ liệu thành công",
            ];
        }
        return json_encode($data_mess, JSON_UNESCAPED_UNICODE);
    }

    public function AccountRegister(Request $request)
    {
        $data_mess = [
            'result' => false,
            'data' => '',
            'message' => "Thiếu dữ liệu truyền lên",
        ];
        $emp_account = $request->get('emp_account');
        $emp_name = $request->get('emp_name');
        $emp_password = $request->get('emp_password');
        $emp_phone = $request->get('emp_phone');
        $emp_birth = $request->get('emp_birth');

        if (
            isset($emp_account) && $emp_account != "" &&
            isset($emp_name) && $emp_name != "" &&
            isset($emp_password) && $emp_password != "" &&
            isset($emp_phone) && $emp_phone != "" &&
            isset($emp_birth) && $emp_birth != ""
        ) {
            $post = User::create([
                'use_name' => $emp_name,
                'use_email_account' => $emp_account,
                'use_role' => 1,
                'use_email_contact' => $emp_account,
                'use_pass' => md5($emp_password),
                'use_phone' => $emp_phone,
                'use_authentic' => 0,
                'use_otp' => 0,
                'use_show' => 1,
                'birthday' => $emp_birth,
                'use_create_time' => time(),
                'use_update_time' => time(),
                'last_login' => time(),
            ]);
            $data_mess = [
                'result' => true,
                'data' => $post,
                'message' => "Đăng ký tài khoản thành công",
            ];
        }
        return json_encode($data_mess, JSON_UNESCAPED_UNICODE);
    }
}