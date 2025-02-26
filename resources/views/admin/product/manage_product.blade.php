<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ $dataSeo['seo_title'] }}</title>
    <!-- SEO -->
    <meta name="keywords" content="{{ $dataSeo['seo_keyword'] }}" />
    <meta name="description" content="{{ $dataSeo['seo_desc'] }}" />
    <link rel="canonical" href="{{ $dataSeo['canonical'] }}" />
    <!-- Thu vien su dung hoac cac muc dung chung -->
    @include('layouts.common_library')
    <!-- link css trang chủ -->
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}?v={{ time() }}">
    <!-- link js chứa hàm chung -->
    <script src="{{ asset('js/function_general.js') }}?v={{ time() }}"></script>
    <!-- link js trang chủ -->
    <script src="{{ asset('js/admin/home.js') }}?v={{ time() }}"></script>
</head>

<body>
    <div class="container_home container_home_admin">
        @include("admin.template.header")
        <section class="admin-page">
            @include("admin.template.sidebar")
            <main id="main">
                <div class="main-container">
                    <div class="main-header">
                        <div class="main-header-nav">
                            Danh sách sản phẩm
                        </div>
                        <div class="main-header-search">
                            <input type="search" name="product_id" id="product_id" placeholder="ID" value="" class="search">
                            <input type="search" name="product_name" id="product_name" placeholder="Tên sản phẩm" value="" class="search">
                            <button type="button" class="btn-search" onclick="Search(this)">Tìm kiếm</button>
                        </div>
                    </div>
                    <div class="main-content">
                        <table id="listing" cellpadding="5" cellspacing="0" border="1" bordercolor="#C3DAF9" width="100%" class="table">
                            <tbody>
                                <tr>
                                    <th class="h" width="30">Stt</th>
                                    <th class="h">ID</th>
                                    <th class="h">Tên sản phẩm</th>
                                    <th class="h">Ảnh đại diện</th>
                                    <th class="h">Giá sản phẩm</th>
                                    <th class="h">Danh mục</th>
                                    <th class="h">Danh mục</th>
                                    <th class="h">Thương hiệu</th>
                                    <th class="h">Kích thước</th>
                                    <th class="h">Màu sắc</th>
                                    <th class="h">Mã màu</th>
                                    <th class="h">Số lượng kho</th>
                                    <th class="h">Thời gian tạo</th>
                                    <th class="h">Thời gian cập nhật</th>
                                    <th class="h">Kích hoạt</th>
                                    <th class="h">Sửa</th>
                                    <th class="h">Xóa</th>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td width="15" align="center">1</td>
                                    <td style="text-align: center">586266</td>
                                    <td><a target="_blank" href="/ung-vien/dinh-thi-thu-hien-uv586266.html" style="text-transform: capitalize;">Đinh thị thu hiền</a></td>
                                    <td style="text-align: center;">
                                        <img style="width:80px;height:80px" src="https://topcvai.com/pictures/2025/02/24/Cz6ZH0yDF8oLBlt.jpg" alt="Đinh thị thu hiền">
                                    </td>
                                    <td style="text-align: center;">Lethuhien128@gmail.com</td>
                                    <td style="text-align: center;">lethuhien128@gmail.com</td>
                                    <td style="text-align: center;">*******</td>
                                    <td style="text-align: center;">Phú Trung, Tân Phú, TP. Hồ Chí Minh</td>
                                    <td style="text-align: center;">24/02/2025 15:38:54</td>
                                    <td style="text-align: center;">Từ Web</td>
                                    <td style="text-align: center;">591030</td>
                                    <td style="text-align: center;">591030</td>
                                    <td style="text-align: center;">24/02/2025 15:38:54</td>
                                    <td style="text-align: center;">24/02/2025 15:38:54</td>
                                    <td width="10" align="center">
                                        <button class="btn-edit">
                                            <img src="{{ asset('/images/admin/check_1.gif') }}" width="12" height="12" alt="icon">
                                        </button>
                                    </td>
                                    <td width="10" align="center">
                                        <button class="btn-edit">
                                            <img src="{{ asset('/images/admin/edit.png') }}" width="12" height="12" alt="icon">
                                        </button>  
                                    </td>  
                                    <td width="10" align="center">
                                        <button class="btn-edit">
                                            <img src="{{ asset('/images/admin/delete.gif') }}" width="12" height="12" alt="icon">
                                        </button>  
                                    </td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </section>
    </div>
</body>

</html>
