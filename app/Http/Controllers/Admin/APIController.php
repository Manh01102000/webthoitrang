<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash; // ✅ Import Hash đúng
use App\Models\Admin; // Import model Admin
use App\Models\product; // Import model product
use App\Models\manage_discount; // Import model manage_discount

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
            'message' => "Thiếu dữ liệu truyền lên",
        ];
        $product_code = $request->get("product_code");
        $product_name = $request->get("product_name");
        $product_description = $request->get("product_description");
        $category = $request->get("category");
        $category_code = $request->get("category_code");
        $category_children_code = $request->get("category_children_code");
        $product_brand = $request->get("product_brand");
        $product_sizes = $request->get("product_sizes");
        $product_colors = $request->get("product_colors");
        $product_code_colors = $request->get("product_code_colors");
        $product_ship = $request->get("product_ship");
        $product_feeship = $request->get("product_feeship");
        $discount_type = $request->get("discount_type");
        $discount_price = $request->get("discount_price");
        $discount_start_time = strtotime($request->get("discount_start_time"));
        $discount_end_time = strtotime($request->get("discount_end_time"));
        $product_classification = $request->get("product_classification");
        $product_stock = $request->get("product_stock");
        $product_price = $request->get("product_price");
        $arr_img = $request->file("arr_img");
        $arr_video = $request->file("arr_video");
        $admin_id = session('admin_id');
        if (
            isset($admin_id) && $admin_id != 0
        ) {
            $dataadmin = Admin::where('admin_id', $admin_id)->get()->first();
            if ($dataadmin) {
                // =========Luồng ảnh video mới của sản phẩm===========
                // ảnh mới của sản phẩm
                $list_arr_image = [];
                if (!empty($arr_img)) {
                    foreach ($arr_img as $uploadedFile) {
                        // Kiểm tra xem có phải là đối tượng UploadedFile không
                        if ($uploadedFile instanceof \Illuminate\Http\UploadedFile) {
                            // Lấy thông tin của file
                            $originalName = $uploadedFile->getClientOriginalName(); // "áo len cổ chữ V xám.jpg"
                            $extension = $uploadedFile->getClientOriginalExtension(); // "jpg"
                            $mimeType = $uploadedFile->getClientMimeType(); // "image/jpeg"
                            $size = $uploadedFile->getSize(); // Dung lượng file (bytes)
                            $tempPath = $uploadedFile->getPathname(); // "C:\xampp\tmp\phpC53D.tmp"

                            // Debug thông tin file (nếu cần kiểm tra)
                            // var_dump($originalName, $extension, $mimeType, $size, $tempPath);

                            // Tạo tên mới cho ảnh (hash để tránh trùng)
                            $name_anh = 'image_prod_' . md5($originalName . time()) . '.' . $extension;

                            // Định nghĩa thư mục lưu ảnh
                            $timeaway = time(); // Nếu không có, lấy thời gian hiện tại
                            $dir_and = getUrlImageVideoProduct($timeaway, 1);

                            // Lưu ảnh vào thư mục
                            $uploadedFile->move($dir_and, $name_anh);

                            // Lưu tên ảnh vào danh sách
                            $list_arr_image[] = $name_anh;
                        }
                    }
                }
                // video mới của sản phẩm
                $list_arr_video = [];
                if (!empty($arr_video)) {
                    foreach ($arr_video as $uploadedFile) {
                        // Kiểm tra xem có phải là đối tượng UploadedFile không
                        if ($uploadedFile instanceof \Illuminate\Http\UploadedFile) {
                            // Lấy thông tin của file
                            $originalName = $uploadedFile->getClientOriginalName(); // "áo len cổ chữ V xám.jpg"
                            $extension = $uploadedFile->getClientOriginalExtension(); // "jpg"
                            $mimeType = $uploadedFile->getClientMimeType(); // "image/jpeg"
                            $size = $uploadedFile->getSize(); // Dung lượng file (bytes)
                            $tempPath = $uploadedFile->getPathname(); // "C:\xampp\tmp\phpC53D.tmp"

                            // Debug thông tin file (nếu cần kiểm tra)
                            // var_dump($originalName, $extension, $mimeType, $size, $tempPath);

                            // Tạo tên mới cho ảnh (hash để tránh trùng)
                            $name_video = 'video_prod_' . md5($originalName . time()) . '.' . $extension;

                            // Định nghĩa thư mục lưu ảnh
                            $timeaway = time(); // Nếu không có, lấy thời gian hiện tại
                            $dir_and = getUrlImageVideoProduct($timeaway, 2);

                            // Lưu ảnh vào thư mục
                            $uploadedFile->move($dir_and, $name_video);

                            // Lưu tên ảnh vào danh sách
                            $list_arr_video[] = $name_video;
                        }
                    }
                }
                // =====Chuyển mảng ảnh thành chuỗi, loại bỏ dấu phẩy dư======
                // lấy chuỗi ảnh lưu vào base
                $str_new_img = (implode(",", $list_arr_image));
                $str_new_img = rtrim(ltrim($str_new_img, ','), ',');
                // lấy chuỗi video lưu vào base
                $str_new_video = (implode(",", $list_arr_video));
                $str_new_video = rtrim(ltrim($str_new_video, ','), ',');
                // =========End luồng ảnh video mới của sản phẩm===========
                $discount_type = $request->get("discount_type");
                $discount_price = $request->get("discount_price");
                $discount_start_time = strtotime($request->get("discount_start_time"));
                $discount_end_time = strtotime($request->get("discount_end_time"));
                // Lưu vào base
                // Bảng product
                product::create([
                    'product_code' => $product_code,
                    'product_admin_id' => $admin_id,
                    'product_name' => $product_name,
                    'product_active' => 0,
                    'product_description' => $product_description,
                    'product_unit' => '',
                    'category' => $category,
                    'category_code' => $category_code,
                    'category_children_code' => $category_children_code,
                    'product_brand' => $product_brand,
                    'product_sizes' => $product_sizes,
                    'product_price' => $product_price,
                    'product_stock' => $product_stock,
                    'product_classification' => $product_classification,
                    'product_colors' => $product_colors,
                    'product_code_colors' => $product_code_colors,
                    'product_images' => $str_new_img,
                    'product_videos' => $str_new_video,
                    'product_ship' => $product_ship,
                    'product_feeship' => $product_feeship,
                    'product_create_time' => time(),
                    'product_update_time' => time(),
                ]);
                // Bảng quản lý khuyến mãi
                manage_discount::create([
                    'discount_admin_id' => $admin_id,
                    'discount_product_code' => $product_code,
                    'discount_name' => "",
                    'discount_description' => "",
                    'discount_active' => 1,
                    'discount_type' => $discount_type,
                    'discount_price' => $discount_price,
                    'discount_start_time' => $discount_start_time,
                    'discount_end_time' => $discount_end_time,
                    'discount_create_time' => time(),
                    'discount_update_time' => time(),
                ]);
                // Trả về dữ liệu thành công
                $data_mess = [
                    'result' => true,
                    'message' => "Thêm dữ liệu sản phẩm thành công",
                ];
            } else {
                // Trả về thông báo lỗi nếu không tìm thấy
                $data_mess = [
                    'result' => false,
                    'message' => "Đăng nhập tài khoản đi",
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
            'message' => "Thiếu dữ liệu truyền lên",
        ];
        $product_code = $request->get("product_code");
        $product_name = $request->get("product_name");
        $product_description = $request->get("product_description");
        $category = $request->get("category");
        $category_code = $request->get("category_code");
        $category_children_code = $request->get("category_children_code");
        $product_brand = $request->get("product_brand");
        $product_sizes = $request->get("product_sizes");
        $product_colors = $request->get("product_colors");
        $product_code_colors = $request->get("product_code_colors");
        $product_ship = $request->get("product_ship");
        $product_feeship = $request->get("product_feeship");
        $discount_type = $request->get("discount_type");
        $discount_price = $request->get("discount_price");
        $discount_start_time = strtotime($request->get("discount_start_time"));
        $discount_end_time = strtotime($request->get("discount_end_time"));
        $product_classification = $request->get("product_classification");
        $product_stock = $request->get("product_stock");
        $product_price = $request->get("product_price");
        $arr_img = $request->file("arr_img");
        $arr_video = $request->file("arr_video");
        $admin_id = session('admin_id');
        if (
            isset($admin_id) && $admin_id != 0
        ) {
            $dataadmin = Admin::where('admin_id', $admin_id)->get()->first();
            if ($dataadmin) {
                // =========Luồng ảnh video mới của sản phẩm===========
                // ảnh mới của sản phẩm
                $list_arr_image = [];
                if (!empty($arr_img)) {
                    foreach ($arr_img as $uploadedFile) {
                        // Kiểm tra xem có phải là đối tượng UploadedFile không
                        if ($uploadedFile instanceof \Illuminate\Http\UploadedFile) {
                            // Lấy thông tin của file
                            $originalName = $uploadedFile->getClientOriginalName(); // "áo len cổ chữ V xám.jpg"
                            $extension = $uploadedFile->getClientOriginalExtension(); // "jpg"
                            $mimeType = $uploadedFile->getClientMimeType(); // "image/jpeg"
                            $size = $uploadedFile->getSize(); // Dung lượng file (bytes)
                            $tempPath = $uploadedFile->getPathname(); // "C:\xampp\tmp\phpC53D.tmp"

                            // Debug thông tin file (nếu cần kiểm tra)
                            // var_dump($originalName, $extension, $mimeType, $size, $tempPath);

                            // Tạo tên mới cho ảnh (hash để tránh trùng)
                            $name_anh = 'image_prod_' . md5($originalName . time()) . '.' . $extension;

                            // Định nghĩa thư mục lưu ảnh
                            $timeaway = time(); // Nếu không có, lấy thời gian hiện tại
                            $dir_and = getUrlImageVideoProduct($timeaway, 1);

                            // Lưu ảnh vào thư mục
                            $uploadedFile->move($dir_and, $name_anh);

                            // Lưu tên ảnh vào danh sách
                            $list_arr_image[] = $name_anh;
                        }
                    }
                }
                // video mới của sản phẩm
                $list_arr_video = [];
                if (!empty($arr_video)) {
                    foreach ($arr_video as $uploadedFile) {
                        // Kiểm tra xem có phải là đối tượng UploadedFile không
                        if ($uploadedFile instanceof \Illuminate\Http\UploadedFile) {
                            // Lấy thông tin của file
                            $originalName = $uploadedFile->getClientOriginalName(); // "áo len cổ chữ V xám.jpg"
                            $extension = $uploadedFile->getClientOriginalExtension(); // "jpg"
                            $mimeType = $uploadedFile->getClientMimeType(); // "image/jpeg"
                            $size = $uploadedFile->getSize(); // Dung lượng file (bytes)
                            $tempPath = $uploadedFile->getPathname(); // "C:\xampp\tmp\phpC53D.tmp"

                            // Debug thông tin file (nếu cần kiểm tra)
                            // var_dump($originalName, $extension, $mimeType, $size, $tempPath);

                            // Tạo tên mới cho ảnh (hash để tránh trùng)
                            $name_video = 'video_prod_' . md5($originalName . time()) . '.' . $extension;

                            // Định nghĩa thư mục lưu ảnh
                            $timeaway = time(); // Nếu không có, lấy thời gian hiện tại
                            $dir_and = getUrlImageVideoProduct($timeaway, 2);

                            // Lưu ảnh vào thư mục
                            $uploadedFile->move($dir_and, $name_video);

                            // Lưu tên ảnh vào danh sách
                            $list_arr_video[] = $name_video;
                        }
                    }
                }
                // =====Chuyển mảng ảnh thành chuỗi, loại bỏ dấu phẩy dư======
                // lấy chuỗi ảnh lưu vào base
                $str_new_img = (implode(",", $list_arr_image));
                $str_new_img = rtrim(ltrim($str_new_img, ','), ',');
                // lấy chuỗi video lưu vào base
                $str_new_video = (implode(",", $list_arr_video));
                $str_new_video = rtrim(ltrim($str_new_video, ','), ',');
                // =========End luồng ảnh video mới của sản phẩm===========
                $discount_type = $request->get("discount_type");
                $discount_price = $request->get("discount_price");
                $discount_start_time = strtotime($request->get("discount_start_time"));
                $discount_end_time = strtotime($request->get("discount_end_time"));
                // Lưu vào base
                // Bảng product
                product::create([
                    'product_code' => $product_code,
                    'product_admin_id' => $admin_id,
                    'product_name' => $product_name,
                    'product_active' => 0,
                    'product_description' => $product_description,
                    'product_unit' => '',
                    'category' => $category,
                    'category_code' => $category_code,
                    'category_children_code' => $category_children_code,
                    'product_brand' => $product_brand,
                    'product_sizes' => $product_sizes,
                    'product_price' => $product_price,
                    'product_stock' => $product_stock,
                    'product_classification' => $product_classification,
                    'product_colors' => $product_colors,
                    'product_code_colors' => $product_code_colors,
                    'product_images' => $str_new_img,
                    'product_videos' => $str_new_video,
                    'product_ship' => $product_ship,
                    'product_feeship' => $product_feeship,
                    'product_create_time' => time(),
                    'product_update_time' => time(),
                ]);
                // Bảng quản lý khuyến mãi
                manage_discount::create([
                    'discount_admin_id' => $admin_id,
                    'discount_product_code' => $product_code,
                    'discount_name' => "",
                    'discount_description' => "",
                    'discount_active' => 1,
                    'discount_type' => $discount_type,
                    'discount_price' => $discount_price,
                    'discount_start_time' => $discount_start_time,
                    'discount_end_time' => $discount_end_time,
                    'discount_create_time' => time(),
                    'discount_update_time' => time(),
                ]);
                // Trả về dữ liệu thành công
                $data_mess = [
                    'result' => true,
                    'message' => "Thêm dữ liệu sản phẩm thành công",
                ];
            } else {
                // Trả về thông báo lỗi nếu không tìm thấy
                $data_mess = [
                    'result' => false,
                    'message' => "Đăng nhập tài khoản đi",
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
