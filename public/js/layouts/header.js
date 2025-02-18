
$("#select-type-fashion").select2({
    dropdownParent: $('.box-append-typefashion')
});

$("#select-type-fashion-mobile").select2({
    dropdownParent: $('.box-append-typefashion-mobile')
});

function openSuggestSearch(e) {
    $('#header .collection-selector').css({
        "opacity": 1,
        "z-index": 1,
        "display": 'block',
    });
}

function openSuggestSearchMobile(e) {
    console.log(11)
    $('.header_container_mobile .collection-selector-mobile').css({
        "opacity": 1,
        "z-index": 1,
        "display": 'block',
    });
}

function closeCollectionSelector(e) {
    $(e).parents('#header').find('.collection-selector').css({
        "opacity": 0,
        "z-index": -1,
        "display": 'none',
    });
}

$(window).click(function (e) {
    if (!$(".collection-selector").is(e.target) && $(".collection-selector").has(e.target).length == 0 && !$(".search-text").is(e.target) && $(".search-text").has(e.target).length == 0) {
        $('#header .collection-selector').css({
            "opacity": 0,
            "z-index": -1,
            "display": 'none',
        });
    }
});

function buttonOpenNav(e) {
    $('.container_navigation_mobile').css({
        "opacity": 1,
        "z-index": 2,
        "display": 'block',
    });
}

function buttonCloseNav(e) {
    $(e).parents('.container_navigation_mobile').css({
        "opacity": 0,
        "z-index": -1,
        "display": 'none',
    });
}

function ShowHideParents(e) {
    let checkshow = $(e).attr("data-showhide");
    if (checkshow == 0) {
        $(e).find(".line2-showhide").css({
            "transform": "rotate(180deg)",
        });
        $(e).attr("data-showhide", 1);
        $(e).parents(".navmobile-menu-lvl0").find(".navmobile-menu-lvl1").css({
            "opacity": 1,
            "display": 'flex',
            "animation": "slide-up 0.6s ease",
        });
    } else if (checkshow == 1) {
        $(e).find(".line2-showhide").css({
            "transform": "rotate(90deg)",
        });
        $(e).attr("data-showhide", 0);
        $(e).parents(".navmobile-menu-lvl0").find(".navmobile-menu-lvl1").css({
            "opacity": -1,
            "display": 'none',
        });
    }
}

function ShowHideChilds(e) {
    let checkshow = $(e).attr("data-showhide");
    if (checkshow == 0) {
        $(e).find(".line2-showhide").css({
            "transform": "rotate(180deg)",
        });
        $(e).attr("data-showhide", 1);
        $(e).parents(".navmobile-menu-child").find(".navmobile-menu-lvl2").css({
            "opacity": 1,
            "display": 'flex',
            "animation": "slide-up 0.6s ease",
        });
    } else if (checkshow == 1) {
        $(e).find(".line2-showhide").css({
            "transform": "rotate(90deg)",
        });
        $(e).attr("data-showhide", 0);
        $(e).parents(".navmobile-menu-child").find(".navmobile-menu-lvl2").css({
            "opacity": -1,
            "display": 'none',
        });
    }
}

function buttonSearchMobile(e) {
    $('.header_container_mobile .SearchMobile-container').css({
        "opacity": 1,
        "display": 'block',
    });
}

function closeSearchMobile(e) {
    $(e).parents('.SearchMobile-container').css({
        "opacity": 0,
        "display": 'none',
    });
}