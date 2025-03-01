<div class="container_content_home container_product_price_good d_flex al_ct jc_ct">
    <div class="content_home product_price_good">
        <div class="content_home_top product_price_good_top d_flex jc_ct jc_sb">
            <div class="cthome_top_left">
                <h2 class="cthome_top_text">🎉 Deal hot hôm nay</h2>
            </div>
            <div class="cthome_top_right cthome_top_right_all">
                <a href="#" rel="nofollow" class="cthome_top_right_viewall">Xem tất cả</a>
                <img src="{{ asset('images/icon/next.png') }}" width="24px" height="24px" alt="icon">
            </div>
        </div>
        <div class="content_home_center product_price_good_center w100 d_flex al_ct">
            <div class="ct_home_center_frame w100 d_flex al_ct">
                <?php for($i = 1; $i <= 8; $i++){ ?>
                <div class="home_center_item">
                    <div class="home_center_item_head">
                        <img class="home_center_item_img lazyload"
                        onerror="this.onerror=null; this.src='{{ asset('images/icon/load.gif') }}';"
                        src="{{ asset('images/product_sample/anh1.jpg') }}"
                        data-src="{{ asset('images/product_sample/anh1.jpg') }}?v={{ time() }}"
                        alt="anh">
                    </div>
                    <div class="home_center_item_desc">
                        <h3 class="hct_item_desc font_s16 line_h24 font_w600" title="Tên sản phẩm">Tên sản phẩm</h3>
                        <div class="container_price_item">
                            <p class="price_item_discount font_s16 line_h20 font_w500">100.000đ</p>
                            <p class="price_item_original font_s14 line_h18 font_w500">130.000đ</p>
                        </div>
                    </div>
                    <div class="home_center_item_infor">
                        <div class="hct_item_infor_detail">
                            <div class="infor_detail_top">
                                <div class="infor_detail_top_title">
                                    <img class="infor_detail_img lazyload" 
                                    onerror="this.onerror=null; this.src='{{ asset('images/icon/load.gif') }}';"
                                    src="{{ asset('images/product_sample/anh1.jpg') }}"
                                    data-src="{{ asset('images/product_sample/anh1.jpg') }}?v={{ time() }}" alt="anh">
                                    <p class="infor_detail_name font_s16 line_h20 font_w500">Tên sản phẩm</p>
                                </div>
                                <div class="infor_detail_top_des">
                                    <p class="infor_detail_productcode">Mã sản phẩm: <span class="span_prdcode">M123456</span></p>
                                    <p class="infor_detail_brand">Thương hiệu: <span class="span_brand">FashionHouses</span></p>
                                    <p class="infor_detail_productstock">Số lượng trong kho: <span class="span_productstock">10</span></p>
                                </div>
                            </div>
                            <div class="infor_detail_center">
                                <div class="boxinfor_detail_price">
                                    <div class="boxinfor_detail_title">Giá bán</div>
                                    <div class="boxinfor_detail_content">
                                        <p class="infor_detail_price_discount font_s18 line_h30 font_w500">100.000đ</p>
                                        <p class="infor_detail_price_original font_s14 line_h18 font_w500">130.000đ</p>
                                    </div>
                                </div>
                                <div class="boxinfor_detail_color">
                                    <div class="boxinfor_detail_title">Màu sắc</div>
                                    <div class="boxinfor_detail_content">
                                        <span class="infor_detail_price_color active_e" data-color="000" style="background:#000"></span>
                                        <span class="infor_detail_price_color" data-color="4CAF50" style="background: #4CAF50"></span>
                                        <span class="infor_detail_price_color" data-color="6067" style="background: #6067"></span>
                                    </div>
                                </div>
                                <div class="boxinfor_detail_size">
                                    <div class="boxinfor_detail_title">Kích cỡ</div>
                                    <div class="boxinfor_detail_content">
                                        <span class="infor_detail_price_size active_e" data-size="S">S</span>
                                        <span class="infor_detail_price_size" data-size="M">M</span>
                                        <span class="infor_detail_price_size" data-size="L">L</span>
                                        <span class="infor_detail_price_size" data-size="XL">XL</span>
                                    </div>
                                </div>
                            </div>
                            <div class="infor_detail_bottom">
                                <button class="infor_detail_bottom_button">
                                    <p class="infor_detail_bottom_text">Thêm giỏ hàng</p>
                                    <svg width="15" class="svg-inline--fa fa-cart-plus fa-w-18" aria-hidden="true" data-prefix="fa" data-icon="cart-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="#FFF" d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="content_home_bottom"></div>
    </div>
</div>