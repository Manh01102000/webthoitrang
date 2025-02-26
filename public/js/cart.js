$(document).ready(function () {
    $(".checkall_product").change(function () {
        if (this.checked) {
            $(".check_product").each(function () {
                this.checked = true;
                $(this).parents('.cart_item').addClass("active_ck")
            })
        } else {
            $(".check_product").each(function () {
                this.checked = false;
                $(this).parents('.cart_item').removeClass("active_ck")
            })
        };
        spam_chon();
    });

    $(".check_product").click(function () {
        if ($(this).is(":checked")) {
            $(this).parents('.cart_item').addClass("active_ck")
            var isAllChecked = 0;
            $(".check_product").each(function () {
                if (!this.checked)
                    isAllChecked = 1;
            })
            if (isAllChecked == 0) {
                $(".checkall_product").prop("checked", true);
            }
        } else {
            $(".checkall_product").prop("checked", false);
            $(this).parents('.cart_item').removeClass("active_ck")
        }

        spam_chon();
    });
});

function spam_chon() {
    var tongsp = 0;
    var phi_vc = 0;
    var tongtien = 0;
    $(".cart_item.active_ck").each(function () {
        tongsp = ++tongsp;

        var phivc = Number($(this).find(".fee_ship").attr("data-feeship"));
        phi_vc = Number(phi_vc) + phivc;

        var tien_tt = Number($(this).find('.product-total-price').attr("data-totalprice"));
        tongtien = Number(tongtien) + tien_tt;
    });

    $('.cart_infor_detail .detail_count_product').find('.count_product').text(tongsp);
    $('.cart_infor_detail .shipping_fee').text(format_money(phi_vc, 0, ',', '.'));
    $('.cart_infor_detail .total_payment').text(format_money(tongtien, 0, ',', '.'));
}

function PlusPrice(e) {
    var key = $(e).attr("data");
    var data_idcart = $(e).parents(".cart_item").attr("data-idcart");
    var so_luong = $(e).parents(".cart_item").find('.product-count').text().trim();
    var don_gia = $('.unitsellingprice_discount').attr("data-price_discount");
    so_luong = ++so_luong;
    var tongtien = Number(don_gia) * Number(so_luong);

    $(e).parents(".cart_item").find('.product-count').text(so_luong);
    $(e).parents(".cart_item").find('.product-total-price').attr('data-totalprice', tongtien);
    $(e).parents(".cart_item").find('.product-total-price').text(format_money(tongtien, '0', ',', '.'));
    // updateCountProduct(so_luong, data_idcart);
    spam_chon();
}

function MinusPrice(e) {
    var key = $(e).attr("data");
    var data_idcart = $(e).parents(".cart_item").attr("data-idcart");
    var so_luong = $(e).parents(".cart_item").find('.product-count').text().trim();
    var don_gia = $('.unitsellingprice_discount').attr("data-price_discount");
    if (so_luong > 1) {
        so_luong = --so_luong;
        var tongtien = Number(don_gia) * Number(so_luong);

        $(e).parents(".cart_item").find('.product-count').text(so_luong);
        $(e).parents(".cart_item").find('.product-total-price').attr('data-totalprice', tongtien);
        $(e).parents(".cart_item").find('.product-total-price').text(format_money(tongtien, '0', ',', '.'));
        // updateCountProduct(so_luong, data_idcart);
        spam_chon();
    }
}

function updateCountProduct(pb, sl, id_gh) {
    $.ajax({
        url: '/ajax/update_slgh_mua.php',
        type: 'POST',
        data: {
            pb: pb,
            so_luong: sl,
            id_gh: id_gh,
        },
        success: function (e) { },
    })
}
