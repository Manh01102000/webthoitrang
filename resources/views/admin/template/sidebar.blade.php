<section id="sidebar">
    <div class="sidebar-menu">
        <ul class="sidebar-menu-item">
            <li class="sidebar-title">Thống kê</li>
            <li class="sidebar-item {{ $active == 1 ? "active" : "" }}">
                <div class="sidebar-link" onclick="ShowHideParents(this)" data-showhide="0">
                    <img class="icon-sidebar" width="16px" height="16px" src="{{ asset('images/admin/dashboard-white.png') }}" alt="icon">
                    <a href="/admin/dashboard" rel="nofollow" class="sidebar-text-gnr font_s14 fl_left font_w500 mt_5 line_h18 cursor_pt">Thống kê</a>
                    <div class="box-icon-showhide">
                        <div class="icon-line-showhide line1-showhide"></div>
                        <div class="icon-line-showhide line2-showhide"></div>
                    </div>
                </div>
            </li>
            <li class="sidebar-title orther-title">Quản lý tài khoản</li>
            <li class="sidebar-item {{ $active == 2 ? "active" : "" }}">
                <div class="sidebar-link" onclick="ShowHideParents(this)" data-showhide="0">
                    <img class="icon-sidebar" width="16px" height="16px" src="{{ asset('images/admin/manaaccount-white.png') }}" alt="icon">
                    <span class="sidebar-text-gnr font_s14 fl_left font_w500 mt_5 line_h18 cursor_pt">Tài khoản quản trị viên</span>
                    <div class="box-icon-showhide">
                        <div class="icon-line-showhide line1-showhide"></div>
                        <div class="icon-line-showhide line2-showhide"></div>
                    </div>
                </div>
                <ul class="submenu submenu-child">
                    <li class="submenu-item">
                        <a href="#" rel="nofollow" class="submenu-link font_s13 font_w400 line_h16">Danh sách</a>
                    </li>
                    <li class="submenu-item">
                        <a href="#"  rel="nofollow" class="submenu-link font_s13 font_w400 line_h16">Thêm mới</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item {{ $active == 3 ? "active" : "" }}">
                <div class="sidebar-link" onclick="ShowHideParents(this)" data-showhide="0">
                    <img class="icon-sidebar" width="16px" height="16px" src="{{ asset('images/admin/manaaccount-white.png') }}" alt="icon">
                    <span class="sidebar-text-gnr font_s14 fl_left font_w500 mt_5 line_h18 cursor_pt">Tài khoản người dùng</span>
                    <div class="box-icon-showhide">
                        <div class="icon-line-showhide line1-showhide"></div>
                        <div class="icon-line-showhide line2-showhide"></div>
                    </div>
                </div>
                <ul class="submenu submenu-child">
                    <li class="submenu-item">
                        <a href="/admin/danh-sach-nguoi-dung" rel="nofollow" class="{{ $_SERVER['REQUEST_URI'] === '/admin/danh-sach-nguoi-dung' ? "active_link" : '' }} submenu-link font_s13 font_w400 line_h16">Danh sách</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/admin/them-moi-nguoi-dung"  rel="nofollow" class="{{ $_SERVER['REQUEST_URI'] === '/admin/them-moi-nguoi-dung' ? "active_link" : '' }} submenu-link font_s13 font_w400 line_h16">Thêm mới</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-title orther-title">Quản lý Bài viết</li>
            <!-- Danh muc bai viet -->
            <li class="sidebar-item {{ $active == 4 ? "active" : "" }}">
                <div class="sidebar-link" onclick="ShowHideParents(this)" data-showhide="0">
                    <img class="icon-sidebar" width="16px" height="16px" src="{{ asset('images/admin/manacategory-white.png') }}" alt="icon">
                    <span class="sidebar-text-gnr font_s14 fl_left font_w500 mt_5 line_h18 cursor_pt">Danh mục bài viết</span>
                    <div class="box-icon-showhide">
                        <div class="icon-line-showhide line1-showhide"></div>
                        <div class="icon-line-showhide line2-showhide"></div>
                    </div>
                </div>
                <ul class="submenu submenu-child">
                    <li class="submenu-item">
                        <a href="#" rel="nofollow" class="submenu-link font_s13 font_w400 line_h16">Danh sách</a>
                    </li>
                    <li class="submenu-item">
                        <a href="#"  rel="nofollow" class="submenu-link font_s13 font_w400 line_h16">Thêm mới</a>
                    </li>
                </ul>
            </li>
            <!-- Bai viet -->
            <li class="sidebar-item {{ $active == 5 ? "active" : "" }}">
                <div class="sidebar-link" onclick="ShowHideParents(this)" data-showhide="0">
                    <img class="icon-sidebar" width="16px" height="16px" src="{{ asset('images/admin/manablog-white.png') }}" alt="icon">
                    <span class="sidebar-text-gnr font_s14 fl_left font_w500 mt_5 line_h18 cursor_pt">Quản lý Bài viết</span>
                    <div class="box-icon-showhide">
                        <div class="icon-line-showhide line1-showhide"></div>
                        <div class="icon-line-showhide line2-showhide"></div>
                    </div>
                </div>
                <ul class="submenu submenu-child">
                    <li class="submenu-item">
                        <a href="#" rel="nofollow" class="submenu-link font_s13 font_w400 line_h16">Danh sách</a>
                    </li>
                    <li class="submenu-item">
                        <a href="#"  rel="nofollow" class="submenu-link font_s13 font_w400 line_h16">Thêm mới</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-title orther-title">Quản lý sản phẩm</li>
            <!-- Danh muc san pham -->
            <li class="sidebar-item {{ $active == 6 ? "active" : "" }}">
                <div class="sidebar-link" onclick="ShowHideParents(this)" data-showhide="0">
                    <img class="icon-sidebar" width="16px" height="16px" src="{{ asset('images/admin/manacategory-white.png') }}" alt="icon">
                    <span class="sidebar-text-gnr font_s14 fl_left font_w500 mt_5 line_h18 cursor_pt">Danh mục sản phẩm</span>
                    <div class="box-icon-showhide">
                        <div class="icon-line-showhide line1-showhide"></div>
                        <div class="icon-line-showhide line2-showhide"></div>
                    </div>
                </div>
                <ul class="submenu submenu-child">
                    <li class="submenu-item">
                        <a href="#" rel="nofollow" class="submenu-link font_s13 font_w400 line_h16">Danh sách</a>
                    </li>
                    <li class="submenu-item">
                        <a href="#"  rel="nofollow" class="submenu-link font_s13 font_w400 line_h16">Thêm mới</a>
                    </li>
                </ul>
            </li>
            <!-- Quan ly san pham -->
            <li class="sidebar-item {{ $active == 7 ? "active" : "" }}">
                <div class="sidebar-link" onclick="ShowHideParents(this)" data-showhide="0">
                    <img class="icon-sidebar" width="16px" height="16px" src="{{ asset('images/admin/manaprod-white.png') }}" alt="icon">
                    <span class="sidebar-text-gnr font_s14 fl_left font_w500 mt_5 line_h18 cursor_pt">Quản lý sản phẩm</span>
                    <div class="box-icon-showhide">
                        <div class="icon-line-showhide line1-showhide"></div>
                        <div class="icon-line-showhide line2-showhide"></div>
                    </div>
                </div>
                <ul class="submenu submenu-child">
                    <li class="submenu-item">
                        <a href="/admin/danh-sach-san-pham" rel="nofollow" class="{{ $_SERVER['REQUEST_URI'] === '/admin/danh-sach-san-pham' ? "active_link" : '' }} submenu-link font_s13 font_w400 line_h16">Danh sách</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/admin/them-moi-san-pham"  rel="nofollow" class="{{ $_SERVER['REQUEST_URI'] === '/admin/them-moi-san-pham' ? "active_link" : '' }} submenu-link font_s13 font_w400 line_h16">Thêm mới</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</section>