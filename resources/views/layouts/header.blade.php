<link rel="preload" href="{{ asset('css/layouts/header.css') }}?v={{ time() }}" media="all" as="style">
<link rel="stylesheet" href="{{ asset('css/layouts/header.css') }}?v={{ time() }}">
<div class="header_container header_container_pc w100">
    <!-- header -->
    <div id="header">
        <div class="container-header">
            <a href="/" class="boxlogo">
                <img src="{{ asset('images/home/logoweb.png') }}?v={{ time() }}" class="logoHeader" alt="logo">
            </a>
            <div class="header_search">
                <!-- loai san pham tim kiem -->
                <div id="search_info" class="list_search">
                    <div class="container-select2">
                        <select class="select-type-fashion" id="select-type-fashion">
                            <option class="search_item" value="0" title="Tất cả">Tất cả</option>                    
                            <option class="search_item" value="1" title="Giầy dép">Giầy dép</option>                    
                            <option class="search_item" value="2" title="Phụ kiện">Phụ kiện</option>                    
                            <option class="search_item" value="3" title="Quần áo">Quần áo</option>                       
                            <option class="search_item" value="4" title="Sơ mi dài tay">Sơ mi dài tay</option>                      
                            <option class="search_item" value="5" title="Sơ mi ngắn tay">Sơ mi ngắn tay</option>                      
                            <option class="search_item" value="6" title="Sản phẩm khuyến mãi">Sản phẩm khuyến mãi</option>                     
                            <option class="search_item" value="7" title="Sản phẩm hot trend">Sản phẩm hot trend</option>                      
                            <option class="search_item" value="8" title="Sản phẩm nổi bật">Sản phẩm nổi bật</option>                      
                            <option class="search_item" value="9" title="Quần short nam">Quần short nam</option>                       
                            <option class="search_item" value="10" title="Quần âu nam">Quần âu nam</option>                      
                            <option class="search_item" value="11" title="Sơ mi nam">Sơ mi nam</option>                    
                            <option class="search_item" value="12" title="Bé gái">Bé gái</option>                       
                            <option class="search_item" value="13" title="Bé trai">Bé trai</option>                       
                            <option class="search_item" value="14" title="Thời trang nữ">Thời trang nữ</option>
                            <option class="search_item" value="15" title="Thời trang Nam">Thời trang Nam</option>
                        </select>
                        <div class="box-append-select2 box-append-typefashion"></div>
                    </div>
                </div>
                <!-- input tim kiem -->
                <input type="search" name="query" value="" id="search-text" placeholder="Tìm sản phẩm bạn mong muốn" class="input-group-field st-default-search-input search-text" autocomplete="off" onclick="openSuggestSearch(this)">
                <!-- button tim kiem -->
                <div class="container_input_search">
                    <button class="btn_search cursor_pt">
                        <img src="{{ asset('images/header/icon-search-white.png') }}?v={{ time() }}" width="20" height="20" alt="icon">
                    </button>
                </div>
                <!-- Box goi y tim kiem -->
                <div class="collection-selector">
                    <div class="collection-selector-top">
                        <p class="title-colslecttop">Kết quả tìm kiếm</p>
                        <button type="button" class="close-collection-selector" onclick="closeCollectionSelector(this)">x</button>
                    </div>
                    <div class="collection-selector-center">
                        <div class="box-show-colslectcenter">
                            <div class="show-colslectcenter-head">
                                <p class="txt-colslecttop-left">Sản phẩm</p>
                                <p class="txt-colslecttop-right">Xem tất cả</p>
                            </div>
                            <div class="show-colslectcenter-content">
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <div class="colslectcenter-content-item">
                                    <div class="colslectcenter-content-item-img">
                                        <img src="{{ asset('images/product_sample/product.png') }}" class="item-img" alt="image">
                                    </div>
                                    <div class="colslectcenter-content-item-detail">
                                        <p class="item-detail-title font_s16 line_h20">Set Đồ Nam ICONDENIM Mind's Maze</p>
                                        <p class="item-detail-price font_s14 line_h16 cl_red">340,00 <sup>đ</sup></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="collection-selector-bottom"></div>
                </div>
            </div>
            <div class="account-header">
                <div class="hd-account">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11.8575 11.6341C13.181 11.6341 14.327 11.1594 15.2635 10.2228C16.1998 9.28636 16.6747 8.14058 16.6747 6.81689C16.6747 5.49365 16.2 4.34771 15.2634 3.41098C14.3268 2.4747 13.1809 2 11.8575 2C10.5338 2 9.388 2.4747 8.45157 3.41113C7.51514 4.34756 7.04028 5.49349 7.04028 6.81689C7.04028 8.14058 7.51514 9.28652 8.45157 10.2229C9.3883 11.1592 10.5342 11.6341 11.8575 11.6341V11.6341ZM9.28042 4.23983C9.99896 3.5213 10.8418 3.17203 11.8575 3.17203C12.8729 3.17203 13.716 3.5213 14.4347 4.23983C15.1532 4.95852 15.5026 5.80157 15.5026 6.81689C15.5026 7.83251 15.1532 8.6754 14.4347 9.39409C13.716 10.1128 12.8729 10.4621 11.8575 10.4621C10.8422 10.4621 9.99926 10.1126 9.28042 9.39409C8.56173 8.67556 8.21231 7.83251 8.21231 6.81689C8.21231 5.80157 8.56173 4.95852 9.28042 4.23983Z" fill="white"></path>
                        <path d="M20.2863 17.379C20.2592 16.9893 20.2046 16.5642 20.1242 16.1153C20.043 15.663 19.9385 15.2354 19.8134 14.8447C19.684 14.4408 19.5084 14.0419 19.2909 13.6597C19.0656 13.2629 18.8007 12.9175 18.5034 12.6332C18.1926 12.3358 17.812 12.0967 17.372 11.9223C16.9334 11.7488 16.4475 11.6609 15.9276 11.6609C15.7234 11.6609 15.526 11.7447 15.1447 11.9929C14.91 12.146 14.6355 12.323 14.3291 12.5188C14.0671 12.6857 13.7122 12.8421 13.2738 12.9837C12.8461 13.1221 12.4118 13.1923 11.983 13.1923C11.5546 13.1923 11.1203 13.1221 10.6923 12.9837C10.2544 12.8423 9.89931 12.6859 9.63778 12.5189C9.33428 12.325 9.05962 12.148 8.82143 11.9928C8.44042 11.7445 8.24297 11.6608 8.03881 11.6608C7.51879 11.6608 7.03295 11.7488 6.59457 11.9225C6.15481 12.0966 5.77411 12.3357 5.46298 12.6334C5.16574 12.9178 4.90085 13.2631 4.67563 13.6597C4.45849 14.0419 4.28271 14.4406 4.15332 14.8448C4.02835 15.2356 3.92383 15.663 3.84265 16.1153C3.76208 16.5636 3.70761 16.9888 3.6806 17.3794C3.65405 17.7614 3.64062 18.1589 3.64062 18.5605C3.64062 19.6045 3.9725 20.4497 4.62695 21.073C5.27331 21.6881 6.12841 21.9999 7.1686 21.9999H16.7987C17.8386 21.9999 18.6937 21.6881 19.3402 21.073C19.9948 20.4501 20.3267 19.6046 20.3267 18.5603C20.3265 18.1573 20.313 17.7598 20.2863 17.379V17.379ZM18.5321 20.2238C18.105 20.6303 17.538 20.8279 16.7986 20.8279H7.1686C6.42901 20.8279 5.862 20.6303 5.43506 20.224C5.0162 19.8253 4.81265 19.281 4.81265 18.5605C4.81265 18.1857 4.82501 17.8157 4.84973 17.4605C4.87384 17.112 4.92312 16.7291 4.99621 16.3223C5.06839 15.9206 5.16025 15.5435 5.2695 15.2022C5.37433 14.8749 5.5173 14.5508 5.69461 14.2386C5.86383 13.941 6.05853 13.6858 6.27337 13.4801C6.47433 13.2877 6.72763 13.1302 7.02609 13.0121C7.30212 12.9028 7.61233 12.843 7.94909 12.834C7.99013 12.8558 8.06322 12.8975 8.18163 12.9747C8.42257 13.1317 8.70028 13.3108 9.00728 13.5069C9.35335 13.7276 9.79921 13.9268 10.3319 14.0988C10.8765 14.2749 11.4319 14.3643 11.9832 14.3643C12.5345 14.3643 13.0901 14.2749 13.6344 14.099C14.1675 13.9267 14.6132 13.7276 14.9597 13.5066C15.2739 13.3058 15.5438 13.1319 15.7848 12.9747C15.9032 12.8976 15.9763 12.8558 16.0173 12.834C16.3542 12.843 16.6644 12.9028 16.9406 13.0121C17.2389 13.1302 17.4922 13.2878 17.6932 13.4801C17.908 13.6856 18.1027 13.9409 18.2719 14.2387C18.4494 14.5508 18.5925 14.875 18.6972 15.202C18.8066 15.5438 18.8986 15.9207 18.9706 16.3222C19.0436 16.7297 19.093 17.1127 19.1171 17.4606V17.4609C19.142 17.8148 19.1545 18.1846 19.1547 18.5605C19.1545 19.2811 18.951 19.8253 18.5321 20.2238V20.2238Z" fill="white"></path>
                    </svg>
                    <div class="list-unstyled">
                        <a class="hd-btn-login font_s16 line_h20 cursor_pt color_fff" href="/dang-nhap-tai-khoan" title="Đăng nhập">Đăng nhập</a>
                        <span>/</span>
                        <a class="hd-btn-regis font_s16 line_h20 cursor_pt color_fff" href="/dang-ky-tai-khoan" title="Đăng ký">Đăng ký</a>
                    </div>
                </div>
                <div class="hd-cart">
                    <a href="" class="header-cart" aria-label="Xem giỏ hàng" title="Giỏ hàng">
                        <img src="{{ asset('images/home/cartorder.png') }}" class="icon_cartorder" alt="icon">
                        <span class="count_item_pr">1</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- navigation -->
    <div class="navigation">    
        <div class="nav-menu">
            <div class="nav-col-menu">
                <nav class="header-nav">
                    <ul class="item_big">
                        <!-- thoi trang nam -->
                        <li class="nav-item active-nav">
                            <div class="nav-item_big">
                                <a class="a-img product-down cl_000 w100 font_s16 line_h20 font_w500" href="" title="Thời trang nam">
                                    Thời trang nam
                                </a>
                            </div>
                            <ul class="nav-item_small">
                                <li>
                                    <div class="item_small-head">
                                        <a class="font_s14 line_h16 cl_000 w100" href="" title="Sơ mi nam">
                                           Áo nam
                                        </a>
                                    </div>
                                    <ul class="item_small-content">
                                        <li>
                                            <a href="" title="Sơ mi ngắn tay" class="font_s14 line_h16 cl_000 w100">Sơ mi ngắn tay</a>
                                        </li>
                                        <li>
                                            <a href="" title="Sơ mi dài tay" class="font_s14 line_h16 cl_000 w100">Sơ mi dài tay</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo Polo" class="font_s14 line_h16 cl_000 w100">Áo Polo</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo Polo" class="font_s14 line_h16 cl_000 w100">Áo vest</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo Polo" class="font_s14 line_h16 cl_000 w100">Áo Khoác</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="item_small-head">
                                        <a class="font_s14 line_h16 cl_000 w100" href="" title="Quần nam">
                                            Quần nam
                                        </a>
                                    </div>
                                    <ul class="item_small-content">
                                        <li>
                                            <a href="" title=" Quần âu nam" class="font_s14 line_h16 cl_000 w100"> Quần âu nam</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần short nam" class="font_s14 line_h16 cl_000 w100">Quần short nam</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- Thoi trang nu -->
                        <li class="nav-item">
                            <div class="nav-item_big">
                                <a class="a-img product-down cl_000 w100 font_s16 line_h20 font_w500" href="" title="Thời trang nữ">
                                    Thời trang nữ
                                </a>
                            </div>
                            <ul class="nav-item_small">
                                <li>
                                    <div class="item_small-head">
                                        <a class="font_s14 line_h16 cl_000 w100" href="" title="Áo">
                                            Áo
                                        </a>
                                    </div>
                                    <ul class="item_small-content">
                                        <li>
                                            <a href="" title="Áo sơ mi" class="font_s14 line_h16 cl_000 w100">Áo sơ mi</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo vest" class="font_s14 line_h16 cl_000 w100">Áo vest</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo demi" class="font_s14 line_h16 cl_000 w100">Áo demi</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo dài" class="font_s14 line_h16 cl_000 w100">Áo dài</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo 2 dây" class="font_s14 line_h16 cl_000 w100">Áo 2 dây</a>
                                        </li>
                                        <li>
                                            <a href="" title="Đồ ngủ" class="font_s14 line_h16 cl_000 w100">Đồ ngủ</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="item_small-head">
                                        <a class="font_s14 line_h16 cl_000 w100" href="" title="Đầm">
                                            Đầm
                                        </a>
                                    </div>
                                    <ul class="item_small-content">
                                        <li>
                                            <a href="" title="Đầm công sở" class="font_s14 line_h16 cl_000 w100">Đầm công sở</a>
                                        </li>
                                        <li>
                                            <a href="" title="Đầm dạo phố" class="font_s14 line_h16 cl_000 w100">Đầm dạo phố</a>
                                        </li>
                                        <li>
                                            <a href="" title="Đầm dạ hội" class="font_s14 line_h16 cl_000 w100">Đầm dạ hội</a>
                                        </li>
                                        <li>
                                            <a href="" title="Váy đầm hoa" class="font_s14 line_h16 cl_000 w100">Váy đầm hoa</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="item_small-head">
                                        <a class="font_s14 line_h16 cl_000 w100" href="" title="Quần">
                                            Quần
                                        </a>
                                    </div>
                                    <ul class="item_small-content">
                                        <li>
                                            <a href="" title="Quần dài" class="font_s14 line_h16 cl_000 w100">Quần dài</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần lửng" class="font_s14 line_h16 cl_000 w100">Quần lửng</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần short" class="font_s14 line_h16 cl_000 w100">Quần short</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần jean" class="font_s14 line_h16 cl_000 w100">Quần jean</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần áo dài" class="font_s14 line_h16 cl_000 w100">Quần áo dài</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="item_small-head">
                                        <a class="font_s14 line_h16 cl_000 w100" href="" title="Chân váy">
                                            Chân váy
                                        </a>
                                    </div>
                                    <ul class="item_small-content">
                                        <li>
                                            <a href="" title="Chân váy dài" class="font_s14 line_h16 cl_000 w100">Chân váy dài</a>
                                        </li>
                                        <li>
                                            <a href="" title="Chân váy ngắn" class="font_s14 line_h16 cl_000 w100">Chân váy ngắn</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="item_small-head">
                                        <a class="font_s14 line_h16 cl_000 w100" href="" title="Phụ kiện">
                                            Phụ kiện
                                        </a>
                                    </div>
                                    <ul class="item_small-content">
                                        <li>
                                            <a href="" title="Túi sách" class="font_s14 line_h16 cl_000 w100">Túi sách</a>
                                        </li>
                                        <li>
                                            <a href="" title="Khăn" class="font_s14 line_h16 cl_000 w100">Khăn</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần tất" class="font_s14 line_h16 cl_000 w100">Quần tất</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo lót" class="font_s14 line_h16 cl_000 w100">Áo lót</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần lót" class="font_s14 line_h16 cl_000 w100">Quần lót</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- Thoi trang be -->
                        <li class="nav-item">
                            <div class="nav-item_big">
                                <a class="a-img product-down cl_000 w100 font_s16 line_h20 font_w500" href="" title="Thời trang bé">
                                    Thời trang bé
                                </a>
                            </div>
                            <ul class="nav-item_small">
                                <li>
                                    <div class="item_small-head">
                                        <a class="font_s14 line_h16 cl_000 w100" href="" title="Bé trai">
                                            Bé trai
                                        </a>
                                    </div>
                                    <ul class="item_small-content">
                                        <li>
                                            <a href="" title="Áo sơ mi" class="font_s14 line_h16 cl_000 w100">Áo sơ mi</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo thun ngắn tay" class="font_s14 line_h16 cl_000 w100">Áo thun ngắn tay</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo dài tay" class="font_s14 line_h16 cl_000 w100">Áo dài tay</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo thun" class="font_s14 line_h16 cl_000 w100">Áo thun</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo nỉ" class="font_s14 line_h16 cl_000 w100">Áo nỉ</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo gile" class="font_s14 line_h16 cl_000 w100">Áo gile</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo khoác" class="font_s14 line_h16 cl_000 w100">Áo khoác</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần short" class="font_s14 line_h16 cl_000 w100">Quần short</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần dài" class="font_s14 line_h16 cl_000 w100">Quần dài</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="item_small-head">
                                        <a class="font_s14 line_h16 cl_000 w100" href="" title="Bé gái">
                                            Bé gái
                                        </a>
                                    </div>
                                    <ul class="item_small-content">
                                        <li>
                                            <a href="" title="Đầm ngắn tay" class="font_s14 line_h16 cl_000 w100">Đầm ngắn tay</a>
                                        </li>
                                        <li>
                                            <a href="" title="Đầm dài tay" class="font_s14 line_h16 cl_000 w100">Đầm dài tay</a>
                                        </li>
                                        <li>
                                            <a href="" title="Đầm hai dây" class="font_s14 line_h16 cl_000 w100">Đầm hai dây</a>
                                        </li>
                                        <li>
                                            <a href="" title="Đầm sát nách" class="font_s14 line_h16 cl_000 w100">Đầm sát nách</a>
                                        </li>
                                        <li>
                                            <a href="" title="Đầm công chúa" class="font_s14 line_h16 cl_000 w100">Đầm công chúa</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo thun" class="font_s14 line_h16 cl_000 w100">Áo thun</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo nỉ" class="font_s14 line_h16 cl_000 w100">Áo nỉ</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo gile" class="font_s14 line_h16 cl_000 w100">Áo gile</a>
                                        </li>
                                        <li>
                                            <a href="" title="Áo khoác" class="font_s14 line_h16 cl_000 w100">Áo khoác</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần short" class="font_s14 line_h16 cl_000 w100">Quần short</a>
                                        </li>
                                        <li>
                                            <a href="" title="Quần dài" class="font_s14 line_h16 cl_000 w100">Quần dài</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- Tin tức -->
                        <li class="nav-item">
                            <div class="nav-item_big">
                                <a class="a-img product-down cl_000 w100 font_s16 line_h20 font_w500" href="" title="Tin tức">
                                    Tin tức
                                </a>
                            </div>
                            <ul class="nav-item_small">
                                <li>
                                    <a class="font_s14 line_h16 cl_000 w100" href="" title="Bài viết nổi bật">
                                        Bài viết nổi bật
                                    </a>
                                </li>
                                <li>
                                    <a class="font_s14 line_h16 cl_000 w100" href="" title="Xu hướng thời trang">
                                        Xu hướng thời trang
                                    </a>
                                </li>
                                <li>
                                    <a class="font_s14 line_h16 cl_000 w100" href="" title="Tuyển dụng">
                                        Tuyển dụng
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Liên hệ -->
                        <li class="nav-item">
                            <div class="nav-item_big">
                                <a class="a-img cl_000 w100 font_s16 line_h20 font_w500" href="" title="Liên hệ">
                                    Liên hệ
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- end navigation -->
</div>
<link rel="preload" href="{{ asset('css/layouts/header_mobile.css') }}?v={{ time() }}" media="all" as="style">
<link rel="stylesheet" href="{{ asset('css/layouts/header_mobile.css') }}?v={{ time() }}">
<div class="header_container header_container_mobile w100">
    <div id="header_mobile">
        <div class="hd-mobile_left">
            <div class="icon-show-menu" onclick="buttonOpenNav(this)">
                <div class="icon-line-showmn line1-showmn"></div>
                <div class="icon-line-showmn line2-showmn"></div>
                <div class="icon-line-showmn line3-showmn"></div>
            </div>
        </div>
        <div class="hd-mobile_center">
            <a href="/" class="hd-mobile-logo">
                <img src="{{ asset('images/home/logoweb.png') }}?v={{ time() }}" class="hd-mobile-imglogo" alt="logo">
            </a>
        </div>
        <div class="hd-mobile_right">
            <div class="button-search-mobile" onclick="buttonSearchMobile(this)">
                <img src="{{ asset('images/header/icon-search-white.png') }}?v={{ time() }}" width="20" height="20" class="icon_search" alt="logo">
            </div>
            <a href="">
                <div class="icon-user">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11.8575 11.6341C13.181 11.6341 14.327 11.1594 15.2635 10.2228C16.1998 9.28636 16.6747 8.14058 16.6747 6.81689C16.6747 5.49365 16.2 4.34771 15.2634 3.41098C14.3268 2.4747 13.1809 2 11.8575 2C10.5338 2 9.388 2.4747 8.45157 3.41113C7.51514 4.34756 7.04028 5.49349 7.04028 6.81689C7.04028 8.14058 7.51514 9.28652 8.45157 10.2229C9.3883 11.1592 10.5342 11.6341 11.8575 11.6341V11.6341ZM9.28042 4.23983C9.99896 3.5213 10.8418 3.17203 11.8575 3.17203C12.8729 3.17203 13.716 3.5213 14.4347 4.23983C15.1532 4.95852 15.5026 5.80157 15.5026 6.81689C15.5026 7.83251 15.1532 8.6754 14.4347 9.39409C13.716 10.1128 12.8729 10.4621 11.8575 10.4621C10.8422 10.4621 9.99926 10.1126 9.28042 9.39409C8.56173 8.67556 8.21231 7.83251 8.21231 6.81689C8.21231 5.80157 8.56173 4.95852 9.28042 4.23983Z" fill="white"></path>
                        <path d="M20.2863 17.379C20.2592 16.9893 20.2046 16.5642 20.1242 16.1153C20.043 15.663 19.9385 15.2354 19.8134 14.8447C19.684 14.4408 19.5084 14.0419 19.2909 13.6597C19.0656 13.2629 18.8007 12.9175 18.5034 12.6332C18.1926 12.3358 17.812 12.0967 17.372 11.9223C16.9334 11.7488 16.4475 11.6609 15.9276 11.6609C15.7234 11.6609 15.526 11.7447 15.1447 11.9929C14.91 12.146 14.6355 12.323 14.3291 12.5188C14.0671 12.6857 13.7122 12.8421 13.2738 12.9837C12.8461 13.1221 12.4118 13.1923 11.983 13.1923C11.5546 13.1923 11.1203 13.1221 10.6923 12.9837C10.2544 12.8423 9.89931 12.6859 9.63778 12.5189C9.33428 12.325 9.05962 12.148 8.82143 11.9928C8.44042 11.7445 8.24297 11.6608 8.03881 11.6608C7.51879 11.6608 7.03295 11.7488 6.59457 11.9225C6.15481 12.0966 5.77411 12.3357 5.46298 12.6334C5.16574 12.9178 4.90085 13.2631 4.67563 13.6597C4.45849 14.0419 4.28271 14.4406 4.15332 14.8448C4.02835 15.2356 3.92383 15.663 3.84265 16.1153C3.76208 16.5636 3.70761 16.9888 3.6806 17.3794C3.65405 17.7614 3.64062 18.1589 3.64062 18.5605C3.64062 19.6045 3.9725 20.4497 4.62695 21.073C5.27331 21.6881 6.12841 21.9999 7.1686 21.9999H16.7987C17.8386 21.9999 18.6937 21.6881 19.3402 21.073C19.9948 20.4501 20.3267 19.6046 20.3267 18.5603C20.3265 18.1573 20.313 17.7598 20.2863 17.379V17.379ZM18.5321 20.2238C18.105 20.6303 17.538 20.8279 16.7986 20.8279H7.1686C6.42901 20.8279 5.862 20.6303 5.43506 20.224C5.0162 19.8253 4.81265 19.281 4.81265 18.5605C4.81265 18.1857 4.82501 17.8157 4.84973 17.4605C4.87384 17.112 4.92312 16.7291 4.99621 16.3223C5.06839 15.9206 5.16025 15.5435 5.2695 15.2022C5.37433 14.8749 5.5173 14.5508 5.69461 14.2386C5.86383 13.941 6.05853 13.6858 6.27337 13.4801C6.47433 13.2877 6.72763 13.1302 7.02609 13.0121C7.30212 12.9028 7.61233 12.843 7.94909 12.834C7.99013 12.8558 8.06322 12.8975 8.18163 12.9747C8.42257 13.1317 8.70028 13.3108 9.00728 13.5069C9.35335 13.7276 9.79921 13.9268 10.3319 14.0988C10.8765 14.2749 11.4319 14.3643 11.9832 14.3643C12.5345 14.3643 13.0901 14.2749 13.6344 14.099C14.1675 13.9267 14.6132 13.7276 14.9597 13.5066C15.2739 13.3058 15.5438 13.1319 15.7848 12.9747C15.9032 12.8976 15.9763 12.8558 16.0173 12.834C16.3542 12.843 16.6644 12.9028 16.9406 13.0121C17.2389 13.1302 17.4922 13.2878 17.6932 13.4801C17.908 13.6856 18.1027 13.9409 18.2719 14.2387C18.4494 14.5508 18.5925 14.875 18.6972 15.202C18.8066 15.5438 18.8986 15.9207 18.9706 16.3222C19.0436 16.7297 19.093 17.1127 19.1171 17.4606V17.4609C19.142 17.8148 19.1545 18.1846 19.1547 18.5605C19.1545 19.2811 18.951 19.8253 18.5321 20.2238V20.2238Z" fill="white"></path>
                    </svg>
                </div>
            </a>
        </div>
    </div>
    <div class="container_navigation_mobile">
        <div class="navigation_mobile">
            <div class="navmobile-top">
                <p class="navmobile-top-title font_s18 line_h24 font_w600">Danh mục sản phẩm</p>
                <span class="navmobile-top-close button-close-nav cursor_pt" onclick="buttonCloseNav(this)">
                    <svg width="18" height="18" viewBox="0 0 19 19" role="presentation">
                        <path d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z" fill-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
            <div class="navmobile-center">
                <!-- Thoi trang nam -->
                <div class="navmobile-menu-show navmobile-menu-lvl0">
                    <div class="navmobile-menu-lv">
                        <p class="navmobile-menu-text">Thời trang nam</p>
                        <div class="box-icon-showhide" onclick="ShowHideParents(this)" data-showhide="0">
                            <div class="icon-line-showhide line1-showhide"></div>
                            <div class="icon-line-showhide line2-showhide"></div>
                        </div>
                    </div>
                    <div class="navmobile-menu-show navmobile-menu-lvl1">
                        <div class="navmobile-menu-child">
                            <div class="navmobile-menu-lv">
                                <p class="navmobile-menu-text">Áo nam</p>
                                <div class="box-icon-showhide" onclick="ShowHideChilds(this)" data-showhide="0">
                                    <div class="icon-line-showhide line1-showhide"></div>
                                    <div class="icon-line-showhide line2-showhide"></div>
                                </div>
                            </div>
                            <div class="navmobile-menu-show navmobile-menu-lvl2">
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Sơ mi ngắn tay</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Sơ mi dài tay</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Áo Polo</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Áo vest</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Áo Khoác</p>
                                </div>
                            </div>
                        </div>
                        <div class="navmobile-menu-child">
                            <div class="navmobile-menu-lv">
                                <p class="navmobile-menu-text">Quần nam</p>
                                <div class="box-icon-showhide" onclick="ShowHideChilds(this)" data-showhide="0">
                                    <div class="icon-line-showhide line1-showhide"></div>
                                    <div class="icon-line-showhide line2-showhide"></div>
                                </div>
                            </div>
                            <div class="navmobile-menu-show navmobile-menu-lvl2">
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Quần âu nam</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Quần short nam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Thoi trang nu -->
                <div class="navmobile-menu-show navmobile-menu-lvl0">
                    <div class="navmobile-menu-lv">
                        <p class="navmobile-menu-text">Thời trang nữ</p>
                        <div class="box-icon-showhide" onclick="ShowHideParents(this)" data-showhide="0">
                            <div class="icon-line-showhide line1-showhide"></div>
                            <div class="icon-line-showhide line2-showhide"></div>
                        </div>
                    </div>
                    <div class="navmobile-menu-show navmobile-menu-lvl1">
                        <div class="navmobile-menu-child">
                            <div class="navmobile-menu-lv">
                                <p class="navmobile-menu-text">Áo</p>
                                <div class="box-icon-showhide" onclick="ShowHideChilds(this)" data-showhide="0">
                                    <div class="icon-line-showhide line1-showhide"></div>
                                    <div class="icon-line-showhide line2-showhide"></div>
                                </div>
                            </div>
                            <div class="navmobile-menu-show navmobile-menu-lvl2">
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Sơ mi ngắn tay</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Sơ mi dài tay</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Áo Polo</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Áo vest</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Áo Khoác</p>
                                </div>
                            </div>
                        </div>
                        <div class="navmobile-menu-child">
                            <div class="navmobile-menu-lv">
                                <p class="navmobile-menu-text">Quần</p>
                                <div class="box-icon-showhide" onclick="ShowHideChilds(this)" data-showhide="0">
                                    <div class="icon-line-showhide line1-showhide"></div>
                                    <div class="icon-line-showhide line2-showhide"></div>
                                </div>
                            </div>
                            <div class="navmobile-menu-show navmobile-menu-lvl2">
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Quần âu nam</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Quần short nam</p>
                                </div>
                            </div>
                        </div>
                        <div class="navmobile-menu-child">
                            <div class="navmobile-menu-lv">
                                <p class="navmobile-menu-text">Đầm</p>
                                <div class="box-icon-showhide" onclick="ShowHideChilds(this)" data-showhide="0">
                                    <div class="icon-line-showhide line1-showhide"></div>
                                    <div class="icon-line-showhide line2-showhide"></div>
                                </div>
                            </div>
                            <div class="navmobile-menu-show navmobile-menu-lvl2">
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Quần âu nam</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Quần short nam</p>
                                </div>
                            </div>
                        </div>
                        <div class="navmobile-menu-child">
                            <div class="navmobile-menu-lv">
                                <p class="navmobile-menu-text">Chân váy</p>
                                <div class="box-icon-showhide" onclick="ShowHideChilds(this)" data-showhide="0">
                                    <div class="icon-line-showhide line1-showhide"></div>
                                    <div class="icon-line-showhide line2-showhide"></div>
                                </div>
                            </div>
                            <div class="navmobile-menu-show navmobile-menu-lvl2">
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Quần âu nam</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Quần short nam</p>
                                </div>
                            </div>
                        </div>
                        <div class="navmobile-menu-child">
                            <div class="navmobile-menu-lv">
                                <p class="navmobile-menu-text">Phụ kiện</p>
                                <div class="box-icon-showhide" onclick="ShowHideChilds(this)" data-showhide="0">
                                    <div class="icon-line-showhide line1-showhide"></div>
                                    <div class="icon-line-showhide line2-showhide"></div>
                                </div>
                            </div>
                            <div class="navmobile-menu-show navmobile-menu-lvl2">
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Quần âu nam</p>
                                </div>
                                <div class="navmobile-menu-lv">
                                    <p class="navmobile-menu-text">Quần short nam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navmobile-bottom">
                
            </div>
        </div>
    </div>
    <div class="SearchMobile-container">
        <div class="SearchMobile">
            <div class="SearchMobile-top">
                <p class="SearchMobile-top-title">Tìm kiếm</p>
                <button class="close-SearchMobile" onclick="closeSearchMobile(this)">x</button>
            </div>
            <div class="SearchMobile-content">
                <div class="SearchMobile-boxsearch">
                    <!-- loai san pham tim kiem -->
                    <div id="search_info_mobile" class="list_search_mobile">
                        <div class="container-select2">
                            <select class="select-type-fashion-mobile" id="select-type-fashion-mobile">
                                <option class="search_item" value="0" title="Tất cả">Tất cả</option>                    
                                <option class="search_item" value="1" title="Giầy dép">Giầy dép</option>                    
                                <option class="search_item" value="2" title="Phụ kiện">Phụ kiện</option>                    
                                <option class="search_item" value="3" title="Quần áo">Quần áo</option>                       
                                <option class="search_item" value="4" title="Sơ mi dài tay">Sơ mi dài tay</option>                      
                                <option class="search_item" value="5" title="Sơ mi ngắn tay">Sơ mi ngắn tay</option>                      
                                <option class="search_item" value="6" title="Sản phẩm khuyến mãi">Sản phẩm khuyến mãi</option>                     
                                <option class="search_item" value="7" title="Sản phẩm hot trend">Sản phẩm hot trend</option>                      
                                <option class="search_item" value="8" title="Sản phẩm nổi bật">Sản phẩm nổi bật</option>                      
                                <option class="search_item" value="9" title="Quần short nam">Quần short nam</option>                       
                                <option class="search_item" value="10" title="Quần âu nam">Quần âu nam</option>                      
                                <option class="search_item" value="11" title="Sơ mi nam">Sơ mi nam</option>                    
                                <option class="search_item" value="12" title="Bé gái">Bé gái</option>                       
                                <option class="search_item" value="13" title="Bé trai">Bé trai</option>                       
                                <option class="search_item" value="14" title="Thời trang nữ">Thời trang nữ</option>
                                <option class="search_item" value="15" title="Thời trang Nam">Thời trang Nam</option>
                            </select>
                            <div class="box-append-select2 box-append-typefashion-mobile"></div>
                        </div>
                    </div>
                    <!-- input tim kiem -->
                    <input type="search" name="query" value="" id="search-text-mobile" placeholder="Tìm sản phẩm bạn mong muốn" class="search-text" autocomplete="off" onclick="openSuggestSearchMobile(this)">
                    <!-- button tim kiem -->
                    <div class="container_input_search_mobile">
                        <button class="btn_search_mobile cursor_pt">
                            <img src="{{ asset('images/header/icon-search-white.png') }}?v={{ time() }}" width="20" height="20" alt="icon">
                        </button>
                    </div>
                </div>
                <!-- Box goi y tim kiem -->
                <div class="collection-selector-mobile">
                    <div class="collection-selector-mobile-center">
                        <div class="box-show-colslectcenter">
                            <div class="show-colslectcenter-head">
                                <p class="txt-colslecttop-left">Sản phẩm</p>
                                <p class="txt-colslecttop-right">Xem tất cả</p>
                            </div>
                            <div class="show-colslectcenter-content">
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <div class="colslectcenter-content-item">
                                    <div class="colslectcenter-content-item-img">
                                        <img src="{{ asset('images/product_sample/product.png') }}" class="item-img" alt="image">
                                    </div>
                                    <div class="colslectcenter-content-item-detail">
                                        <p class="item-detail-title font_s16 line_h20">Set Đồ Nam ICONDENIM Mind's Maze</p>
                                        <p class="item-detail-price font_s14 line_h16 cl_red">340,00 <sup>đ</sup></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/layouts/header.js') }}?v={{ time() }}" defer></script>