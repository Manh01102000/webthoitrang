$(document).on("click", ".regis-box", function () {
    $(this).find('.regis-box-title').css({
        'transition': "all 0.5s ease",
        'transform': "translateY(0px)",
        'font-size': "14px",
    });

    $(this).find('.regis_inp').focus();
});

$(document).on("focusout", ".regis_inp", function () {
    let checkinput = $(this).val().trim(); // Lấy giá trị input hiện tại

    let title = $(this).closest('.regis-box').find('.regis-box-title'); // Lấy tiêu đề của input này

    if (checkinput === "") {
        title.css({
            'transition': "all 0.5s ease",
            'transform': "translateY(15px)",
            'font-size': "16px",
        });
    }
});