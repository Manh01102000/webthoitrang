$(document).on('click', '.btn_suggest_right .slick-next', function () {
    console.log(1);
    $('.container-showresult-search .list_suggest')[0].scrollLeft = $('.container-showresult-search .list_suggest').scrollLeft() + $('.container-showresult-search .list_suggest').width();
});

$(document).on('click', '.slick-prev', function () {
    console.log(1);
    $('.container-showresult-search .list_suggest').scrollLeft() - $('.container-showresult-search .list_suggest').width() > 0 ? $('.container-showresult-search .list_suggest').scrollLeft() - $('.container-showresult-search .list_suggest').width() : 0;
    $('.container-showresult-search .list_suggest')[0].scrollLeft = $('.container-showresult-search .list_suggest').scrollLeft() - $('.container-showresult-search .list_suggest').width();
});

$(document).on("click", ".infor_detail_price_size", function () {
    $(".boxinfor_detail_content .infor_detail_price_size").removeClass("active_e");
    $(this).addClass('active_e');
    // let data_size = $(this).attr("data-size");
    // console.log(data_size);
});

$(document).on("click", ".infor_detail_price_color", function () {
    $(".boxinfor_detail_content .infor_detail_price_color").removeClass("active_e");
    $(this).addClass('active_e');
    // let data_color = $(this).attr("data-color");
    // console.log(data_color);
})