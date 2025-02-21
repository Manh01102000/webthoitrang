<?php
use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Cache;

// Hàm Lấy link ảnh avatar
if (!function_exists('geturlimageAvatar')) {
    function geturlimageAvatar($time_stamp)
    {
        $month = date('m', $time_stamp);
        $year = date('Y', $time_stamp);
        $day = date('d', $time_stamp);
        $dir = "../pictures/" . $year . "/" . $month . "/" . $day . "/"; // Full Path
        is_dir($dir) || @mkdir($dir, 0777, true) || die("Can't Create folder");
        return $dir;
    }
}
// Hàm xóa dấu
if (!function_exists('remove_accent')) {
    function remove_accent($mystring)
    {
        $marTViet = array(
            "à",
            "á",
            "ạ",
            "ả",
            "ã",
            "â",
            "ầ",
            "ấ",
            "ậ",
            "ẩ",
            "ẫ",
            "ă",
            "ằ",
            "ắ",
            "ặ",
            "ẳ",
            "ẵ",
            "è",
            "é",
            "ẹ",
            "ẻ",
            "ẽ",
            "ê",
            "ề",
            "ế",
            "ệ",
            "ể",
            "ễ",
            "ì",
            "í",
            "ị",
            "ỉ",
            "ĩ",
            "ò",
            "ó",
            "ọ",
            "ỏ",
            "õ",
            "ô",
            "ồ",
            "ố",
            "ộ",
            "ổ",
            "ỗ",
            "ơ",
            "ờ",
            "ớ",
            "ợ",
            "ở",
            "ỡ",
            "ù",
            "ú",
            "ụ",
            "ủ",
            "ũ",
            "ư",
            "ừ",
            "ứ",
            "ự",
            "ử",
            "ữ",
            "ỳ",
            "ý",
            "ỵ",
            "ỷ",
            "ỹ",
            "đ",
            "À",
            "Á",
            "Ạ",
            "Ả",
            "Ã",
            "Â",
            "Ầ",
            "Ấ",
            "Ậ",
            "Ẩ",
            "Ẫ",
            "Ă",
            "Ằ",
            "Ắ",
            "Ặ",
            "Ẳ",
            "Ẵ",
            "È",
            "É",
            "Ẹ",
            "Ẻ",
            "Ẽ",
            "Ê",
            "Ề",
            "Ế",
            "Ệ",
            "Ể",
            "Ễ",
            "Ì",
            "Í",
            "Ị",
            "Ỉ",
            "Ĩ",
            "Ò",
            "Ó",
            "Ọ",
            "Ỏ",
            "Õ",
            "Ô",
            "Ồ",
            "Ố",
            "Ộ",
            "Ổ",
            "Ỗ",
            "Ơ",
            "Ờ",
            "Ớ",
            "Ợ",
            "Ở",
            "Ỡ",
            "Ù",
            "Ú",
            "Ụ",
            "Ủ",
            "Ũ",
            "Ư",
            "Ừ",
            "Ứ",
            "Ự",
            "Ử",
            "Ữ",
            "Ỳ",
            "Ý",
            "Ỵ",
            "Ỷ",
            "Ỹ",
            "Đ",
            "'"
        );

        $marKoDau = array(
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "a",
            "e",
            "e",
            "e",
            "e",
            "e",
            "e",
            "e",
            "e",
            "e",
            "e",
            "e",
            "i",
            "i",
            "i",
            "i",
            "i",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "o",
            "u",
            "u",
            "u",
            "u",
            "u",
            "u",
            "u",
            "u",
            "u",
            "u",
            "u",
            "y",
            "y",
            "y",
            "y",
            "y",
            "d",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "A",
            "E",
            "E",
            "E",
            "E",
            "E",
            "E",
            "E",
            "E",
            "E",
            "E",
            "E",
            "I",
            "I",
            "I",
            "I",
            "I",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "O",
            "U",
            "U",
            "U",
            "U",
            "U",
            "U",
            "U",
            "U",
            "U",
            "U",
            "U",
            "Y",
            "Y",
            "Y",
            "Y",
            "Y",
            "D",
            ""
        );

        return str_replace($marTViet, $marKoDau, $mystring);
    }
}
// Hàm lấy client_ip
if (!function_exists('client_ip')) {
    function client_ip()
    {
        $array = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR',
        ];
        foreach ($array as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                        return $ip;
                    }
                }
            }
        }
    }
}
// Hàm chuyển title sang dạng slug, alias
if (!function_exists('replaceTitle')) {
    function replaceTitle($title)
    {
        $title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
        $title = remove_accent($title);
        $title = str_replace('/', '', $title);
        $title = preg_replace('/[^\00-\255]+/u', '', $title);

        if (preg_match("/[\p{Han}]/simu", $title)) {
            $title = str_replace(' ', '-', $title);
        } else {
            $arr_str = array("&lt;", "&gt;", "/", " / ", "\\", "&apos;", "&quot;", "&amp;", "lt;", "gt;", "apos;", "quot;", "amp;", "&lt", "&gt", "&apos", "&quot", "&amp", "&#34;", "&#39;", "&#38;", "&#60;", "&#62;");

            $title = str_replace($arr_str, " ", $title);
            $title = preg_replace('/\p{P}|\p{S}/u', ' ', $title);
            $title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);

            //Remove double space
            $array = array(
                '    ' => ' ',
                '   ' => ' ',
                '  ' => ' ',
            );
            $title = trim(strtr($title, $array));
            $title = str_replace(" ", "-", $title);
            $title = urlencode($title);
            // remove cac ky tu dac biet sau khi urlencode
            $array_apter = array("%0D%0A", "%", "&", "---");
            $title = str_replace($array_apter, "-", $title);
            $title = strtolower($title);
        }
        return $title;
    }
}
//Hàm lấy thời gian
if (!function_exists('lay_tgian')) {
    function lay_tgian($tgian)
    {
        // Lấy chênh lệch thời gian tính bằng giây
        $tg = time() - $tgian; // Get the difference in seconds
        $thoi_gian = '';

        if ($tg > 0) {
            if ($tg < 60) {
                $thoi_gian = $tg . ' giây';
            } else if ($tg >= 60 && $tg < 3600) {
                $thoi_gian = floor($tg / 60) . ' phút';
            } else if ($tg >= 3600 && $tg < 86400) {
                $thoi_gian = floor($tg / 3600) . ' giờ';
            } else if ($tg >= 86400 && $tg < 2592000) {
                $thoi_gian = floor($tg / 86400) . ' ngày';
            } else if ($tg >= 2592000 && $tg < 77760000) {
                $thoi_gian = floor($tg / 2592000) . ' tháng';
            } else if ($tg >= 77760000 && $tg < 933120000) {
                $thoi_gian = floor($tg / 77760000) . ' năm';
            }
        } else {
            $thoi_gian = '1 giây';
        }

        return $thoi_gian;
    }
}
//Hàm lấy thời gian
if (!function_exists('timeAgo')) {
    function timeAgo($timestamp)
    {
        $now = time(); // Lấy thời gian hiện tại dưới dạng timestamp (giây)
        $secondsAgo = $now - $timestamp;

        if ($secondsAgo < 60) {
            return "$secondsAgo giây trước";
        } else if ($secondsAgo < 3600) {
            $minutesAgo = floor($secondsAgo / 60);
            return "$minutesAgo phút trước";
        } else if ($secondsAgo < 86400) {
            $hoursAgo = floor($secondsAgo / 3600);
            return "$hoursAgo giờ trước";
        } else if ($secondsAgo < 604800) {
            $daysAgo = floor($secondsAgo / 86400);
            return "$daysAgo ngày trước";
        } else if ($secondsAgo < 2592000) {
            $weeksAgo = floor($secondsAgo / 604800);
            return "$weeksAgo tuần trước";
        } else if ($secondsAgo < 31536000) {
            $monthsAgo = floor($secondsAgo / 2592000);
            return "$monthsAgo tháng trước";
        } else {
            $yearsAgo = floor($secondsAgo / 31536000);
            return "$yearsAgo năm trước";
        }
    }
}
//
// link chi tiet ung vien
function rewriteUV($id, $name)
{
    $alias = replaceTitle($name);
    if ($alias == '') {
        $alias = 'nguoi-ngoai-quoc';
    }
    return "/" . $alias . "-us" . $id;
}
// Lấy dữ liệu NTD Hoặc UV
function InForAccount()
{
    $user_id = !empty($_COOKIE['UID']) ? $_COOKIE['UID'] : 0;
    $userType = !empty($_COOKIE['UT']) ? $_COOKIE['UT'] : 0;
    // Kiểm tra xem tài khoản là ứng viên hay NTD
    $dataAccount = [
        'islogin' => 0,
        'data' => [
            'us_name' => '',
            'us_logo' => '',
            'us_link' => '',
            'us_account' => '',
            'us_active' => 0,
            'us_id' => '',
            'active_account' => '',
            'us_show' => '',
        ],
        'type' => '',
    ];

    if ($user_id && $user_id > 0) {
        // gọi đến API Lấy dữ liệu ứng viên

        $dataUser = User::where('use_id', $user_id)->get()->first()->toArray();
        if ($dataUser) {
            $linkaccount = rewriteUV($user_id, $dataUser['use_name']);
            $emailTK = $dataUser['use_email_account'];
            $authentic = $dataUser['use_authentic'];
            $use_show = $dataUser['use_show'];
            $use_phone = $dataUser['use_phone'];
            $use_email_contact = $dataUser['use_email_contact'];
            $use_address = $dataUser['address'];
            $sex = $dataUser['gender'];
            $birthday = $dataUser['birthday'];

            $dataall = [
                'us_name' => $dataUser['use_name'],
                'us_logo' => $dataUser['use_logo'],
                'us_link' => $linkaccount,
                'us_account' => $emailTK,
                'use_phone' => $use_phone,
                'use_email_contact' => $use_email_contact,
                'use_address' => $use_address,
                'use_sex' => $sex,
                'use_birthday' => $birthday,
                'us_active' => $authentic,
                'us_id' => $user_id,
                'us_show' => $use_show,
            ];
            $dataAccount = [
                'islogin' => 1,
                'data' => $dataall,
                'type' => $userType,
            ];
        }
    }
    return $dataAccount;
}

// Lấy dữ liệu danh mục
if (!function_exists('InForCategory')) {
    function InForCategory()
    {
        $category = Cache::rememberForever('category', function () {
            return category::all()->toArray();
        });

        return $category;
    }
}

// Lấy dữ liệu danh mục con (dùng đệ quy: kỹ thuật mà một hàm tự gọi lại chính nó cho đến khi đạt điều kiện dừng)

if (!function_exists('getCategoryTree')) {
    function getCategoryTree($parent_id = 0)
    {
        $categories = Cache::rememberForever('category', function () {
            return category::all()->toArray();
        });

        $tree = [];
        foreach ($categories as $category) {
            if ($category['cat_parent_code'] == $parent_id) {
                $category['children'] = getCategoryTree($category['cat_id']); // Lấy danh mục con
                $tree[] = $category;
            }
        }

        return $tree;
    }
}

// Hàm lấy chuỗi cuối cùng
if (!function_exists('getLastWord')) {

    function getLastWord($fullName)
    {
        $fullName = trim($fullName); // Loại bỏ khoảng trắng thừa
        $lastSpace = strrpos($fullName, ' '); // Tìm vị trí dấu cách cuối cùng

        if ($lastSpace !== false) {
            return substr($fullName, $lastSpace + 1); // Lấy phần sau dấu cách cuối cùng
        }

        return $fullName; // Nếu chỉ có 1 từ, trả về nguyên chuỗi
    }
}

// Hàm call data mảng
if (!function_exists('CallApi')) {
    function CallApi($data, $url, $time = 0, $method = 'post')
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($time != 0) {
            curl_setopt($curl, CURLOPT_TIMEOUT, $time);
        }
        if ($method = 'get') {
            curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');

        } else if ($method = 'post') {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        }
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);

        return $response;
    }
}

// Hàm call data json
if (!function_exists('CallApiJson')) {

    // Hàm call với data là json
    function CallApiJson($data, $url, $time = 0)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        if ($time != 0) {
            curl_setopt($curl, CURLOPT_TIMEOUT, $time);
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
