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
                
            </main>
        </section>
    </div>
</body>

</html>
