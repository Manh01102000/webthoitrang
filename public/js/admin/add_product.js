
$(document).ready(function () {
    // Nhúng ckeditor
    CKEDITOR.replace('product_description');
    // Nhúng select2
    $("#category").select2({
        dropdownParent: $('.box-append-category')
    });

    $("#category_code").select2({
        dropdownParent: $('.box-append-category_code')
    });

    $("#category_children_code ").select2({
        dropdownParent: $('.box-append-category_children_code ')
    });

    $("#discount_type").select2({
        dropdownParent: $('.box-append-discount_type')
    });

    $("#product_sizes").select2({
        dropdownParent: $('.box-append-product_sizes'),
        placeholder: "Chọn kích thước",
        allowClear: false,
    });
    // end nhúng select2

    // Lấy dữ liệu danh mục con cấp 1
    $("#category").on("change", function () {
        let val = $(this).val();
        console.log(val);
        if (val) {
            $.ajax({
                'type': "POST",
                'url': "/api/getCategoryByID",
                'data': {
                    id: val
                },
                dataType: "JSON",
                success: function (data) {
                    if (data) {
                        console.log(data);
                        let dataCate = data.data;
                        html = '<option value="0">Chọn danh mục</option>';
                        dataCate.forEach((element, index) => {
                            html += `<option value=" ${element['cat_code']}"> ${element['cat_name']}</option>`;
                        });
                        $("#category_code").html(html);
                    }
                }
            });
        }
    });

    // Lấy dữ liệu danh mục con cấp 2
    $("#category_code").on("change", function () {
        let val = $(this).val();
        console.log(val);
        if (val) {
            $.ajax({
                'type': "POST",
                'url': "/api/getCategoryByID",
                'data': {
                    id: val
                },
                dataType: "JSON",
                success: function (data) {
                    if (data) {
                        console.log(data);
                        let dataCate = data.data;
                        html = '<option value="0">Chọn danh mục</option>';
                        dataCate.forEach((element, index) => {
                            html += `<option value=" ${element['cat_code']}"> ${element['cat_name']}</option>`;
                        });
                        $("#category_children_code").html(html);
                    }
                }
            });
        }
    });

});

//===================Luồng thông tin sản phẩm======================
function cartesian(...value) {
    // ...value gom tất cả tham số thành một mảng
    // (...valude): cartesian([6, 8], ['c', 'e'], ['X', 'Y']) =>  [[6, 8], ['c', 'e'], ['X', 'Y']]
    // ví dụ về cách hoạt động của cartesian
    // [[6, 8], ['c', 'e'], ['X', 'Y']]
    // Vòng 1 duyệt mảng [[]] với [6, 8]
    // tem0 => [[6],[8]] 
    // vòng 2 lấy kết quả temp0 [[6],[8]] với ['c','e']
    // tem1 => [[6,'c'],[6,'e'],[8,'c'],[8,'e']] 
    // vòng 3 lấy kết quả temp1 [[6,'c'],[6,'e'],[8,'c'],[8,'e']]  với ['X', 'Y']
    // tem2 => [
    //         [6,'c','X'],
    //         [6,'c','Y'],
    //         [6,'e,'X'],
    //         [6,'e,'Y'],
    //         [8,'c','X'],
    //         [8,'c','Y'],
    //         [8,'e,'X'],
    //         [8,'e,'Y'],
    //        ]
    let result = [[]];  // Bắt đầu với một mảng chứa mảng rỗng
    value.forEach((arr, index) => {  // Duyệt qua từng mảng con
        let temp = [];  // Mảng tạm để chứa kết quả mới
        result.forEach(r => {  // Duyệt qua từng tổ hợp đã có trước đó
            arr.forEach((item, idx) => {  // Duyệt qua từng phần tử trong mảng con hiện tại
                temp.push([...r, item.trim()]);  // Thêm phần tử mới vào tổ hợp
                // [...r, item] sẽ đẩy item vào cuối của [] giống với r.concat(item) (lưu ý r là mảng ví dụ [6])
                // ví dụ [...[6],5] => [6,5]; giống với [6].concat(5) => [6,5]
            });
        });
        result = temp;  // Cập nhật lại result với tổ hợp mới
    });

    return result;
}

function UpdateTTSP(e) {
    var product_sizes = $("#product_sizes");
    var product_colors = $("#product_colors");
    let validate1 = validate2 = true;

    if (product_sizes.val() == '' || product_sizes.val().length == 0) {
        if (product_sizes.parent().hasClass("error-mess") == false) {
            product_sizes.parent().addClass("error-mess");
            product_sizes.parent().after("<label class='error-mess' id='product_sizes_error'>Vui lòng chọn kích thước sản phẩm</label>");
        }
        $('#product_sizes').focus();
        validate1 = false;
    } else {
        product_sizes.parent().removeClass("error-mess");
        $("#product_sizes_error").remove();
    }

    if (product_colors.val().trim() == '') {
        if (product_colors.parent().hasClass("error-mess") == false) {
            product_colors.parent().addClass("error-mess");
            product_colors.parent().append("<label class='error-mess' id='product_colors_error'>Vui lòng nhập màu sắc sản phẩm</label>");
        }
        $('#product_colors').focus();
        validate2 = false;
    } else {
        product_colors.parent().removeClass("error-mess");
        $("#product_colors_error").remove();
    }

    if (validate1 == true && validate2 == true) {
        $("#loading").show();
        var product_sizes = $("#product_sizes").val();
        var product_colors = $("#product_colors").val();
        product_colors = product_colors.split(',');
        let array = cartesian(product_sizes, product_colors);
        let html = ``;
        array.forEach((element, index) => {
            html += `<div class="footer_bangphanloai d_flex al_ct">
            <div class="footer_bpl_loai font_s13 line_h16 font_w400 cl_000">${element.join()}</div>
            <div class="footer_bpl_soluongkho">
                <input type="number" min="0" name="product_stock" id="product_stock_${index + 1}" class="product_stock" placeholder="Nhập số lượng kho">
            </div>
            <div class="footer_bpl_giaban">
                <input type="text" onkeyup="format_gtri(this)" name="product_price" id="product_price_${index + 1}" class="product_price" placeholder="Nhập giá sản phẩm" autocomplete="off">
            </div>
            <div class="footer_bpl_xoa">
                <img src="/images/icon/icon_delete.png" width="18px" height="19px" class="icon_delete_loai cursor_pt" onclick="delete_bangplsp(this)">
            </div>
        </div>`;
        });
        $(".m_bangphanloai .container_ft_bpl").html(html);

        setInterval(() => {
            $("#loading").hide();
        }, 500);
        $(".m_bangphanloai").show();
    }

}

function delete_bangplsp(e) {
    $(e).parents('.footer_bangphanloai').remove();
    var count_nplsp = $('.footer_bangphanloai').length;
    console.log(count_nplsp)
    if (count_nplsp == 0) {
        $('.m_bangphanloai').hide();
    }
}

//===================Luồng khuyến mãi sản phẩm======================
function format_gtri(id) {
    if (event.which >= 37 && event.which <= 40) return;
    // format number
    $(id).val(function (index, value) {
        return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
}

function addKhuyenMai(e) {
    var html = `<div class="container_km_bangkm d_flex fl_cl gap_10">
        <div class="bkm_xoa_km w100 d_flex jc_end">
            <img src="/images/icon/icon_delete.png" width="18px" height="19px" class="icon_xoa_km cursor_pt" onclick="DeleteDiscount(this)">
        </div>
        <div class="bkm_loai_giatri_km d_flex gap_10">
            <div class="box_loai_km box_input_infor">
                <label class="form-label font_s13 line_h16 font_w500 cl_000">Loại giảm giá <span style="color:red">*</span></label>
                <div class="container-select">
                    <select class="discount_type select_100" id="discount_type" onchange="ChangeDiscType(this)">
                        <option value="">Chọn</option>
                        <option value="1">Giảm %</option>
                        <option value="2">Giảm số tiền</option>
                    </select>
                    <div class="box-append-select box-append-discount_type"></div>
                </div>
            </div>
            <div class="box_giatri_km box_input_infor">
                <label class="form-label font_s13 line_h16 font_w500 cl_000">Giá trị <span style="color:red">*</span></label>
                <div class="giatri_km d_flex al_ct">
                    <input type="text" name="product_discount_price" id="product_discount_price" class="product_discount_price font_s13 line_h16 font_w400 cl_000" onkeyup="format_gtri(this)" placeholder="Nhập giá trị giảm giá">
                    <p class="show_dv_km font_s13 line_h16 font_w400 cl_000">%</p>
                </div>
            </div>
        </div>
        <div class="bkm_ngaybd_ngaykt_km d_flex gap_10">
            <div class="box_bkm_ngaybd box_input_infor">
                <label class="form-label font_s13 line_h16 font_w500 cl_000">Ngày bắt đầu <span style="color:red">*</span></label>
                <input type="date" name="product_createtime_discount" class="product_createtime_discount" id="product_createtime_discount">
            </div>
            <div class="box_bkm_ngaykt box_input_infor">
                <label class="form-label font_s13 line_h16 font_w500 cl_000">Ngày kết thúc <span style="color:red">*</span></label>
                <input type="date" name="product_endtime_discount" class="product_endtime_discount" id="product_endtime_discount">
            </div>
        </div>
    </div>`;
    $('.khuyenmai_bangkm').html(html);
    $('.khuyenmai_bangkm').show();
    $('.khuyemai_add_khuyemmai').hide();
}

function ChangeDiscType(e) {
    var loai_km = $(e).val();
    var txt1 = `đ`;
    var txt2 = `%`;
    if (loai_km == 1) {
        $('.box_giatri_km .product_discount_price').prop("disabled", false);
        $('.box_giatri_km .show_dv_km').text(txt2);
        $('.box_giatri_km .product_discount_price').attr("placeholder", "0");
        $('.box_giatri_km .product_discount_price').attr("maxlength", "3");
    } else if (loai_km == 2) {
        $('.box_giatri_km .product_discount_price').prop("disabled", false);
        $('.box_giatri_km .show_dv_km').text(txt1);
        $('.box_giatri_km .product_discount_price').attr("placeholder", "Nhập giá trị giảm");
        $('.box_giatri_km .product_discount_price').removeAttr("maxlength");
    } else {
        $('.box_giatri_km .product_discount_price').prop("disabled", true);
    }
}

function DeleteDiscount(e) {
    $(e).parents('.khuyenmai_bangkm').html('');
    $(e).parents('.khuyenmai_bangkm').hide();
    $('.khuyemai_add_khuyemmai').show();
}

//==================== Luồng ảnh =====================
$(document).ready(function () {
    var count = $('.frame_imgvideo .box_img_video').length;
    if (count > 0) {
        $('.icon_addimgvideo').show();
    } else {
        $('.icon_addimgvideo').hide();
    }
});

function loadVideo(e) {
    var file_data = $('#product_images').prop('files')[0];
    if (file_data != undefined) {
        $("#loading").show();
        var size = (file_data.size / (1024 * 1024)).toFixed(2);
        var type = file_data.type;
        var name = file_data.name;
        var image = new Image();
        image.src = URL.createObjectURL(file_data);
        var match = ["video/m4v", "video/mp4", "video/ogm", "video/wmv", "video/mpg", "video/ogv", "video/webm", "video/mov", "video/asx", "video/mpeg", 'image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG'];
        if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4] || type == match[5] || type == match[6] || type == match[7] || type == match[8] || type == match[9] || type == match[10] || type == match[11] || type == match[12] || type == match[13] || type == match[14] || type == match[15]) {
            if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4] || type == match[5] || type == match[6] || type == match[7] || type == match[8] || type == match[9] || type == match[10]) {
                var html = '';
                if (size <= 20) {
                    var checkslvideo = '';
                    $('.box_img_video[data-video="1"]').each(function () {
                        checkslvideo = $(this).length;
                    })
                    if (checkslvideo.length < 1) {
                        $('.list_imgvideo').show();
                        $('.icon_addimgvideo').show();
                        html += `<div class="box_img_video" data-new-video="1" data=${file_data} data-video="1">
                                  <video src="${URL.createObjectURL(file_data)}" controls class="imgvideo_preview"></video>
                                  <img src="/images/icon/xoaanh.svg" class="icon_delete" onclick="icon_delete_img(this)">
                                </div>`;
                        $('.box_listimgvideo .frame_imgvideo').append(html);
                        $('.box_listimgvideo .frame_imgvideo .box_img_video[data-new-video="1"]').data("file", file_data).removeAttr('data-new-video', 1);
                        $("#loading").hide();
                    } else {
                        alert(name + " Tối đa 1 video");
                    }
                } else {
                    alert(name + " Video tải lên vượt quá 20 MB");
                }
            } else {
                var html = '';
                if (size <= 2) {
                    if ($('.box_img_video[data-img="1"]').length < 10) {
                        $('.list_imgvideo').show();
                        $('.icon_addimgvideo').show();
                        html += `<div class="box_img_video" data-new-img="1" data=${file_data} data-img="1">
                                <img src="${URL.createObjectURL(file_data)}" class="imgvideo_preview">
                                <img src="/images/icon/xoaanh.svg" class="icon_delete" onclick="icon_delete_img(this)">
                              </div>`;
                        $('.box_listimgvideo .frame_imgvideo').append(html);
                        $('.box_listimgvideo .frame_imgvideo .box_img_video[data-new-img="1"]').data("file", file_data).removeAttr('data-new-img', 1);
                        $("#loading").hide();
                    } else {
                        alert(name + " Tối đa 10 ảnh");
                    }
                } else {
                    alert(name + " Ảnh tải lên vượt quá 2 MB");
                }
            }
        } else {
            alert(name + " sai định dạng ảnh hoặc video vui lòng chọn ảnh hoặc video hợp lệ có định dạng: png, jpg, jpeg, gif, jfif, mp4, m4v, ogm, wmv, mpg, ogv, webm");
        }
    };
};

function icon_delete_img(e) {
    var data_del = $(e).parents('.box_img_video').attr("data_name");
    if (!data_del) {
        $(e).parents('.box_img_video').remove();
    } else {
        $(e).parents('.box_img_video').hide();
        $(e).parents('.box_img_video').attr("data_del", data_del);

        $(e).parents('.box_img_video[data-new-img="0"]').attr("data-img", 0);
        $(e).parents('.box_img_video[data-new-video="0"]').attr("data-video", 0);

        $(e).parents('.box_img_video[data-new-img="0"]').attr("data_name", "");
        $(e).parents('.box_img_video[data-new-video="0"]').attr("data_name", "");
    }
    if ($('.box_img_video').length) {
        $('.icon_addimgvideo').show();
    } else {
        $('.icon_addimgvideo').hide();
    }
}
//==================== Luồng validate =====================
// Kiểm tra đã nhập
function validatenew(valuecheck, content, text) {
    let validate = true;
    const value = valuecheck.val().trim();
    if (value === "") {
        if (!valuecheck.parent().hasClass("error-mess")) {
            valuecheck.parent().addClass("error-mess");
            valuecheck.parent().append(
                `<label id='${text}_error' class='error-mess'>${content}</label>`
            );
        }
        valuecheck.focus();
        validate = false;
    } else {
        valuecheck.parent().removeClass("error-mess");
        $(`#${text}_error`).remove();
    }
    return validate;
}
// kiểm tra nhập cho select2
function validateSelect2(valuecheck, content, text) {
    let validate = true;
    const selectedValues = $(valuecheck).val();
    if (!selectedValues) {
        if (!valuecheck.parent().hasClass("error-mess")) {
            valuecheck.parent().addClass("error-mess");
            valuecheck.parent().append(
                `<label id='${text}_error' class='error-mess'>${content}</label>`
            );
        }
        valuecheck.focus();
        validate = false;
    } else {
        valuecheck.parent().removeClass("error-mess");
        $(`#${text}_error`).remove();
    }
    return validate;
}
// Kiểm tra nhập
$(document).ready(function () {
    // validate mã sp
    $(document).on("keyup", "#product_code", function () {
        var product_code = $(this);
        if (product_code.val().trim() == '') {
            if (product_code.parent().hasClass("error-mess") == false) {
                product_code.parent().addClass("error-mess");
                product_code.parent().append("<label class='error-mess' id='product_code_error'>Vui lòng nhập mã sản phẩm</label>");
            }
            $('#product_code').focus();
        } else {
            product_code.parent().removeClass("error-mess");
            $("#product_code_error").remove();
        }
    });
    // validate tên sp
    $(document).on("keyup", "#product_name", function () {
        var product_name = $(this);
        if (product_name.val().trim() == '') {
            if (product_name.parent().hasClass("error-mess") == false) {
                product_name.parent().addClass("error-mess");
                product_name.parent().append("<label class='error-mess' id='product_name_error'>Vui lòng nhập tên sản phẩm</label>");
            }
            $('#product_name').focus();
        } else {
            product_name.parent().removeClass("error-mess");
            $("#product_name_error").remove();
        }
    });

    // validate mô tả sp
    CKEDITOR.instances["product_description"].on("change", function () {
        let product_description_val = this.getData().trim(); // Lấy nội dung CKEditor
        if (product_description_val === '') {
            if (!$("#product_description").parent().hasClass("error-mess")) {
                $("#product_description").parent().addClass("error-mess");
                $("#product_description").parent().append("<label class='error-mess' id='product_description_error'>Vui lòng nhập mô tả sản phẩm</label>");
            }
        } else {
            $("#product_description").parent().removeClass("error-mess");
            $("#product_description_error").remove();
        }
    });

    // validate danh mục
    $(document).on("change", "#category", function () {
        var category = $(this);
        if (category.val().trim() == 0) {
            if (category.parent().hasClass("error-mess") == false) {
                category.parent().addClass("error-mess");
                category.parent().after("<label class='error-mess' id='category_error'>Vui lòng chọn danh mục sản phẩm</label>");
            }
            $('#category').focus();
        } else {
            category.parent().removeClass("error-mess");
            $("#category_error").remove();
        }
    });
    // validate danh mục
    $(document).on("change", "#category_code", function () {
        var category_code = $(this);
        if (category_code.val().trim() == 0) {
            if (category_code.parent().hasClass("error-mess") == false) {
                category_code.parent().addClass("error-mess");
                category_code.parent().after("<label class='error-mess' id='category_code_error'>Vui lòng chọn danh mục sản phẩm</label>");
            }
            $('#category_code').focus();
        } else {
            category_code.parent().removeClass("error-mess");
            $("#category_code_error").remove();
        }
    });
    // validate danh mục
    $(document).on("change", "#category_children_code", function () {
        var category_children_code = $(this);
        if (category_children_code.val().trim() == 0) {
            if (category_children_code.parent().hasClass("error-mess") == false) {
                category_children_code.parent().addClass("error-mess");
                category_children_code.parent().after("<label class='error-mess' id='category_children_code_error'>Vui lòng chọn danh mục sản phẩm</label>");
            }
            $('#category_children_code').focus();
        } else {
            category_children_code.parent().removeClass("error-mess");
            $("#category_children_code_error").remove();
        }
    });
    // validate tên thương hiệu
    $(document).on("keyup", "#product_brand", function () {
        var product_brand = $(this);
        if (product_brand.val().trim() == '') {
            if (product_brand.parent().hasClass("error-mess") == false) {
                product_brand.parent().addClass("error-mess");
                product_brand.parent().append("<label class='error-mess' id='product_brand_error'>Vui lòng nhập tên thương hiệu</label>");
            }
            $('#product_brand').focus();
        } else {
            product_brand.parent().removeClass("error-mess");
            $("#product_brand_error").remove();
        }
    });
    // validate kích thước
    $(document).on("change", "#product_sizes", function () {
        var product_sizes = $(this);
        if (product_sizes.val() == '' || product_sizes.val().length == 0) {
            if (product_sizes.parent().hasClass("error-mess") == false) {
                product_sizes.parent().addClass("error-mess");
                product_sizes.parent().after("<label class='error-mess' id='product_sizes_error'>Vui lòng chọn kích thước sản phẩm</label>");
            }
            $('#product_sizes').focus();
        } else {
            product_sizes.parent().removeClass("error-mess");
            $("#product_sizes_error").remove();
        }
    });
    // validate màu sắc
    $(document).on("change", "#product_colors", function () {
        var product_colors = $(this);
        if (product_colors.val().trim() == '') {
            if (product_colors.parent().hasClass("error-mess") == false) {
                product_colors.parent().addClass("error-mess");
                product_colors.parent().append("<label class='error-mess' id='product_colors_error'>Vui lòng nhập màu sắc sản phẩm</label>");
            }
            $('#product_colors').focus();
            validate2 = false;
        } else {
            product_colors.parent().removeClass("error-mess");
            $("#product_colors_error").remove();
        }
    });
    // validate mã màu sắc
    $(document).on("change", "#product_code_colors", function () {
        var product_code_colors = $(this);
        if (product_code_colors.val().trim() == '') {
            if (product_code_colors.parent().hasClass("error-mess") == false) {
                product_code_colors.parent().addClass("error-mess");
                product_code_colors.parent().append("<label class='error-mess' id='product_code_colors_error'>Vui lòng nhập mã màu sắc sản phẩm</label>");
            }
            $('#product_code_colors').focus();
            validate2 = false;
        } else {
            product_code_colors.parent().removeClass("error-mess");
            $("#product_code_colors_error").remove();
        }
    });
    // validate giá sp
    $(document).on("keyup", ".product_price", function () {
        var product_price = $(this);
        var product_id = product_price.attr("id"); // Lấy ID của input

        if (product_price.val().trim() == '') {
            if (!product_price.parent().hasClass("error-mess")) {
                product_price.parent().addClass("error-mess");
                product_price.parent().append(`<label class='error-mess' id='${product_id}_error'>Vui lòng nhập giá sản phẩm</label>`);
            }
            $("#" + product_id).focus();
        } else {
            product_price.parent().removeClass("error-mess");
            $("#" + product_id + "_error").remove();
        }
    });
    // validate số lượng kho
    $(document).on("keyup", ".product_stock", function () {
        var product_stock = $(this);
        var stock_id = product_stock.attr("id"); // Lấy ID của input

        if (product_stock.val().trim() == '') {
            if (!product_stock.parent().hasClass("error-mess")) {
                product_stock.parent().addClass("error-mess");
                product_stock.parent().append(`<label class='error-mess' id='${stock_id}_error'>Vui lòng nhập số lượng kho</label>`);
            }
            $("#" + stock_id).focus();
        } else {
            product_stock.parent().removeClass("error-mess");
            $("#" + stock_id + "_error").remove();
        }
    });

});
// VALIDATE PRODUCT
function validateProduct() {
    var product_code = $("#product_code");
    var product_name = $("#product_name");
    var product_description = $("#product_description");
    var product_price = $(".product_price");
    var category = $("#category");
    var category_code = $("#category_code");
    var category_children_code = $("#category_children_code");
    var product_brand = $("#product_brand");
    var product_sizes = $("#product_sizes");
    var product_colors = $("#product_colors");
    var product_code_colors = $("#product_code_colors");
    var product_stock = $(".product_stock");
    var shipping_input = $(".shipping_input");
    var product_feeship = $("#product_feeship");

    let validate1 = validate2 = validate3 = validate4 = validate5 = validate6 = validate7 = validate8 = validate9 = validate10 = validate11 = validate12 = validate13 = validate14 = validate15 = validate16 = validate17 = true;

    if (product_code.val().trim() == '') {
        if (product_code.parent().hasClass("error-mess") == false) {
            product_code.parent().addClass("error-mess");
            product_code.parent().append("<label class='error-mess' id='product_code_error'>Vui lòng nhập mã sản phẩm</label>");
        }
        $('#product_code').focus();
        validate1 = false;
    } else {
        product_code.parent().removeClass("error-mess");
        $("#product_code_error").remove();
    }

    if (product_name.val().trim() == '') {
        if (product_name.parent().hasClass("error-mess") == false) {
            product_name.parent().addClass("error-mess");
            product_name.parent().append("<label class='error-mess' id='product_name_error'>Vui lòng nhập tên sản phẩm</label>");
        }
        $('#product_name').focus();
        validate2 = false;
    } else {
        product_name.parent().removeClass("error-mess");
        $("#product_name_error").remove();
    }

    let product_description_val = CKEDITOR.instances["product_description"].getData();
    if (product_description_val.trim() == '') {
        if (product_description.parent().hasClass("error-mess") == false) {
            product_description.parent().addClass("error-mess");
            product_description.parent().append("<label class='error-mess' id='product_description_error'>Vui lòng nhập mô tả sản phẩm</label>");
        }
        $('#product_description').focus();
        validate3 = false;
    } else {
        product_description.parent().removeClass("error-mess");
        $("#product_description_error").remove();
    }

    if (category.val().trim() == 0) {
        if (category.parent().hasClass("error-mess") == false) {
            category.parent().addClass("error-mess");
            category.parent().after("<label class='error-mess' id='category_error'>Vui lòng chọn danh mục sản phẩm</label>");
        }
        $('#category').focus();
        validate4 = false;
    } else {
        category.parent().removeClass("error-mess");
        $("#category_error").remove();
    }

    if (category_code.val().trim() == 0) {
        if (category_code.parent().hasClass("error-mess") == false) {
            category_code.parent().addClass("error-mess");
            category_code.parent().after("<label class='error-mess' id='category_code_error'>Vui lòng chọn danh mục sản phẩm</label>");
        }
        $('#category_code').focus();
        validate5 = false;
    } else {
        category_code.parent().removeClass("error-mess");
        $("#category_code_error").remove();
    }

    if (category_children_code.val().trim() == 0) {
        if (category_children_code.parent().hasClass("error-mess") == false) {
            category_children_code.parent().addClass("error-mess");
            category_children_code.parent().after("<label class='error-mess' id='category_children_code_error'>Vui lòng chọn danh mục sản phẩm</label>");
        }
        $('#category_children_code').focus();
        validate6 = false;
    } else {
        category_children_code.parent().removeClass("error-mess");
        $("#category_children_code_error").remove();
    }

    if (product_brand.val().trim() == '') {
        if (product_brand.parent().hasClass("error-mess") == false) {
            product_brand.parent().addClass("error-mess");
            product_brand.parent().append("<label class='error-mess' id='product_brand_error'>Vui lòng nhập tên thương hiệu</label>");
        }
        $('#product_brand').focus();
        validate7 = false;
    } else {
        product_brand.parent().removeClass("error-mess");
        $("#product_brand_error").remove();
    }

    if (product_sizes.val() == '' || product_sizes.val().length == 0) {
        if (product_sizes.parent().hasClass("error-mess") == false) {
            product_sizes.parent().addClass("error-mess");
            product_sizes.parent().after("<label class='error-mess' id='product_sizes_error'>Vui lòng chọn kích thước sản phẩm</label>");
        }
        $('#product_sizes').focus();
        validate8 = false;
    } else {
        product_sizes.parent().removeClass("error-mess");
        $("#product_sizes_error").remove();
    }

    if (product_colors.val().trim() == '') {
        if (product_colors.parent().hasClass("error-mess") == false) {
            product_colors.parent().addClass("error-mess");
            product_colors.parent().append("<label class='error-mess' id='product_colors_error'>Vui lòng nhập màu sắc sản phẩm</label>");
        }
        $('#product_colors').focus();
        validate9 = false;
    } else {
        product_colors.parent().removeClass("error-mess");
        $("#product_colors_error").remove();
    }

    if (product_code_colors.val().trim() == '') {
        if (product_code_colors.parent().hasClass("error-mess") == false) {
            product_code_colors.parent().addClass("error-mess");
            product_code_colors.parent().append("<label class='error-mess' id='product_code_colors_error'>Vui lòng nhập mã màu sắc sản phẩm</label>");
        }
        $('#product_code_colors').focus();
        validate10 = false;
    } else {
        product_code_colors.parent().removeClass("error-mess");
        $("#product_code_colors_error").remove();
    }

    product_stock.each(function () {
        var product_stock = $(this);
        var stock_id = product_stock.attr("id"); // Lấy ID của input

        if (product_stock.val().trim() == '') {
            if (!product_stock.parent().hasClass("error-mess")) {
                product_stock.parent().addClass("error-mess");
                product_stock.parent().append(`<label class='error-mess' id='${stock_id}_error'>Vui lòng nhập số lượng kho</label>`);
            }
            validate11 = false;
            $("#" + stock_id).focus();
        } else {
            product_stock.parent().removeClass("error-mess");
            $("#" + stock_id + "_error").remove();
        }
    });

    product_price.each(function () {
        var product_price = $(this);
        var product_id = product_price.attr("id"); // Lấy ID của input

        if (product_price.val().trim() == '') {
            if (!product_price.parent().hasClass("error-mess")) {
                product_price.parent().addClass("error-mess");
                product_price.parent().append(`<label class='error-mess' id='${product_id}_error'>Vui lòng nhập giá sản phẩm</label>`);
            }
            validate12 = false;
            $("#" + product_id).focus();
        } else {
            product_price.parent().removeClass("error-mess");
            $("#" + product_id + "_error").remove();
        }
    });

    if ($("input[name='shipping']:checked").val().trim() == "2") {
        if (product_feeship.val().trim() == '') {
            if (product_feeship.parent().hasClass("error-mess") == false) {
                product_feeship.parent().addClass("error-mess");
                product_feeship.parent().append("<label class='error-mess' id='product_feeship_error'>Vui lòng nhập phí vận chuyển</label>");
            }
            $('#product_feeship').focus();
            validate13 = false;
        } else {
            product_feeship.parent().removeClass("error-mess");
            $("#product_feeship_error").remove();
        }
    }

    if ($(".khuyenmai_bangkm").is(":visible")) {
        var discount_type = $("#discount_type");
        var product_discount_price = $("#product_discount_price");
        var product_createtime_discount = $("#product_createtime_discount");
        var product_endtime_discount = $("#product_endtime_discount");
        if (discount_type.val().trim() == '') {
            if (discount_type.parent().hasClass("error-mess") == false) {
                discount_type.parent().addClass("error-mess");
                discount_type.parent().append("<label class='error-mess' id='discount_type_error'>Vui lòng chọn loại giảm giá</label>");
            }
            $('#discount_type').focus();
            validate14 = false;
        } else {
            discount_type.parent().removeClass("error-mess");
            $("#discount_type_error").remove();
        }

        if (product_discount_price.val().trim() == '') {
            if (product_discount_price.parent().hasClass("error-mess") == false) {
                product_discount_price.parent().addClass("error-mess");
                product_discount_price.parent().after("<label class='error-mess' id='product_discount_price_error'>Vui lòng nhập giá trị giảm giá</label>");
            }
            $('#product_discount_price').focus();
            validate15 = false;
        } else {
            product_discount_price.parent().removeClass("error-mess");
            $("#product_discount_price_error").remove();
        }

        if (product_createtime_discount.val().trim() == '') {
            if (product_createtime_discount.parent().hasClass("error-mess") == false) {
                product_createtime_discount.parent().addClass("error-mess");
                product_createtime_discount.parent().append("<label class='error-mess' id='product_createtime_discount_error'>Vui lòng nhập thời gian bắt đầu khuyến mãi</label>");
            }
            $('#product_createtime_discount').focus();
            validate16 = false;
        } else {
            product_createtime_discount.parent().removeClass("error-mess");
            $("#product_createtime_discount_error").remove();
        }

        if (product_endtime_discount.val().trim() == '') {
            if (product_endtime_discount.parent().hasClass("error-mess") == false) {
                product_endtime_discount.parent().addClass("error-mess");
                product_endtime_discount.parent().append("<label class='error-mess' id='product_endtime_discount_error'>Vui lòng nhập thời gian kết thúc khuyến mãi</label>");
            }
            $('#product_endtime_discount').focus();
            validate17 = false;
        } else {
            product_endtime_discount.parent().removeClass("error-mess");
            $("#product_endtime_discount_error").remove();
            if (product_endtime_discount.val().trim() < product_createtime_discount.val().trim()) {
                if (product_endtime_discount.parent().hasClass("error-mess") == false) {
                    product_endtime_discount.parent().addClass("error-mess");
                    product_endtime_discount.parent().append("<label class='error-mess' id='product_endtime_discount_error'>Vui lòng nhập thời gian kết thúc lớn hơn thời gian bắt đầu</label>");
                }
                $('#product_endtime_discount').focus();
                validate17 = false;
            } else {
                product_endtime_discount.parent().removeClass("error-mess");
                $("#product_endtime_discount_error").remove();
            }

        }
    }

    if (
        validate1 == false ||
        validate2 == false ||
        validate3 == false ||
        validate4 == false ||
        validate5 == false ||
        validate6 == false ||
        validate7 == false ||
        validate8 == false ||
        validate9 == false ||
        validate10 == false ||
        validate11 == false ||
        validate12 == false ||
        validate13 == false ||
        validate14 == false ||
        validate15 == false ||
        validate16 == false ||
        validate17 == false
    ) {
        return false;
    }
    return true;
}
// 
function CreateProduct(e) {
    let validate = validateProduct();
    console.log(validate);
    // if (validate) {
    //     $('#loading').show();
    //     // ========================ẢNH VIDEO MỚI======================
    //     $('.box_img_video[data-video="1"]').each(function () {
    //         var video = $(this).data('file');
    //         if (video != "" && video != undefined) {
    //             console.log(video);
    //             formdata.append('arr_video[]', video);
    //         }
    //     });
    //     $('.box_img_video[data-img="1"]').each(function () {
    //         var img = $(this).data('file');
    //         if (img != "" && img != undefined) {
    //             console.log(img);
    //             formdata.append('arr_img[]', img);
    //         }
    //     });
    //     // =====================ẢNH VIDEO XÓA========================
    //     var arr_video_del = [];
    //     $('.box_img_video[data-video="0"]').each(function () {
    //         var video_del = $(this).attr("data_del");
    //         if (video_del != "" && video_del != undefined) {
    //             arr_video_del.push(video_del);
    //             formdata.append('arr_video_del', arr_video_del);
    //         }
    //     });
    //     var arr_img_del = [];
    //     $('.box_img_video[data-img="0"]').each(function () {
    //         var img_del = $(this).attr("data_del");
    //         if (img_del != "" && img_del != undefined) {
    //             arr_img_del.push(img_del);
    //             formdata.append('arr_img_del', arr_img_del);
    //         }
    //     });
    //     // ======================ẢNH VIDEO CŨ=======================
    //     var arr_video_old = [];
    //     $('.box_img_video[data-new-video="0"]').each(function () {
    //         var video_old = $(this).attr("data_name");
    //         if (video_old != "" && video_old != undefined) {
    //             arr_video_old.push(video_old);
    //             formdata.append('arr_video_old', arr_video_old);
    //         }
    //     });
    //     var arr_img_old = [];
    //     $('.box_img_video[data-new-img="0"]').each(function () {
    //         var img_old = $(this).attr("data_name");
    //         if (img_old != "" && img_old != undefined) {
    //             arr_img_old.push(img_old);
    //             formdata.append('arr_img_old', arr_img_old);
    //         }
    //     });
    //     $.ajax({
    //         type: "POST",
    //         url: "/api/CreateProduct",
    //         dataType: "JSON",
    //         async: false,
    //         contentType: false,
    //         processData: false,
    //         data: formdata,
    //         success: function (data) {
    //             $('#loading').hide();
    //             if (data.result) {
    //                 alert(data.msg);
    //                 window.location.href = '/admin/danh-sach-san-pham';
    //             } else {
    //                 alert(data.msg);
    //             }
    //         }
    //     });
    // }
}
//
function UpdateProduct(e) {
    let validate = validateProduct();
    if (validate) {
        $('#loading').show();
        // ========================ẢNH VIDEO MỚI======================
        $('.box_img_video[data-video="1"]').each(function () {
            var video = $(this).data('file');
            if (video != "" && video != undefined) {
                console.log(video);
                formdata.append('arr_video[]', video);
            }
        });
        $('.box_img_video[data-img="1"]').each(function () {
            var img = $(this).data('file');
            if (img != "" && img != undefined) {
                console.log(img);
                formdata.append('arr_img[]', img);
            }
        });
        // =====================ẢNH VIDEO XÓA========================
        var arr_video_del = [];
        $('.box_img_video[data-video="0"]').each(function () {
            var video_del = $(this).attr("data_del");
            if (video_del != "" && video_del != undefined) {
                arr_video_del.push(video_del);
                formdata.append('arr_video_del', arr_video_del);
            }
        });
        var arr_img_del = [];
        $('.box_img_video[data-img="0"]').each(function () {
            var img_del = $(this).attr("data_del");
            if (img_del != "" && img_del != undefined) {
                arr_img_del.push(img_del);
                formdata.append('arr_img_del', arr_img_del);
            }
        });
        // ======================ẢNH VIDEO CŨ=======================
        var arr_video_old = [];
        $('.box_img_video[data-new-video="0"]').each(function () {
            var video_old = $(this).attr("data_name");
            if (video_old != "" && video_old != undefined) {
                arr_video_old.push(video_old);
                formdata.append('arr_video_old', arr_video_old);
            }
        });
        var arr_img_old = [];
        $('.box_img_video[data-new-img="0"]').each(function () {
            var img_old = $(this).attr("data_name");
            if (img_old != "" && img_old != undefined) {
                arr_img_old.push(img_old);
                formdata.append('arr_img_old', arr_img_old);
            }
        });
        $.ajax({
            type: "POST",
            url: "/api/UpdateProduct",
            dataType: "JSON",
            async: false,
            contentType: false,
            processData: false,
            data: formdata,
            success: function (data) {
                $('#loading').hide();
                if (data.result) {
                    alert(data.msg);
                    window.location.href = '/admin/danh-sach-san-pham';
                } else {
                    alert(data.msg);
                }
            }
        });
    }
}
//
// khi click vao phi van chuyen thi box nhap phi van chuyen show
$(document).on('click', '.product_fee_ship', function () {
    if ($('.product_fee_ship').is(":checked")) {
        $('.box_feeshipping .enter_fee_shipping').show();
    }
})
// khi click vao mien phi van chuyen thi box nhap phi van chuyen hide
$(document).on('click', '.product_free_ship', function () {
    if ($('.product_free_ship').is(":checked")) {
        $('.box_feeshipping .enter_fee_shipping').hide();
        $('.box_feeshipping .product_feeship').val("");
    }
})