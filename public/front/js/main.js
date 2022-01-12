$(function() {
    "use strict";
    $(window).on("load", function(s) {
        $(".preloader").delay(300).fadeOut(300)
    }), $("#search").on("click", function() {
        $(".search-box").fadeIn(600)
    }), $(".closebtn").on("click", function() {
        $(".search-box").fadeOut(600)
    }), $(window).on("scroll", function(s) {
        $(window).scrollTop() < 245 ? ($(".navigation").removeClass("sticky"), $(".navigation-3 img").attr("src", "images/logo-2.png")) : ($(".navigation").addClass("sticky"), $(".navigation-3 img").attr("src", "images/logo.png"))
    }), $(".navbar-toggler").on("click", function() {
        $(this).toggleClass("active")
    });
    var s = $(".sub-menu-bar .navbar-nav .sub-menu");
    s.length && (s.parent("li").children("a").append(function() {
        return '<button class="sub-nav-toggler"> <i class="fa fa-chevron-down"></i> </button>'
    }), $(".sub-menu-bar .navbar-nav .sub-nav-toggler").on("click", function() {
        return $(this).parent().parent().children(".sub-menu").slideToggle(), !1
    }));
    ! function() {
        var s = $(".slider-active");

        function e(s) {
            s.each(function() {
                var s = $(this),
                    e = s.data("delay"),
                    a = "animated " + s.data("animation");
                s.css({
                    "animation-delay": e,
                    "-webkit-animation-delay": e
                }), s.addClass(a).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function() {
                    s.removeClass(a)
                })
            })
        }
        s.on("init", function(s, a) {
            e($(".single-slider:first-child").find("[data-animation]"))
        }), s.on("beforeChange", function(s, a, i, n) {
            e($('.single-slider[data-slick-index="' + n + '"]').find("[data-animation]"))
        }), s.slick({
            autoplay: !0,
            autoplaySpeed: 1e4,
            pauseOnHover: !1,
            dots: !1,
            fade: !1,
            arrows: !0,
            prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fa fa-angle-right"></i></span>',
            responsive: [{
                breakpoint: 767,
                settings: {
                    dots: !1,
                    arrows: !1
                }
            }]
        })
    }(), $(".category-slied").slick({
        dots: !0,
        infinite: !1,
        speed: 800,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: !0,
        prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="fa fa-angle-right"></i></span>',
        responsive: [{
            breakpoint: 922,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    }), $(".course-slied").slick({
        dots: !1,
        infinite: !0,
        speed: 800,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: !0,
        autoplaySpeed: 5e3,
        arrows: !0,
        prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="fa fa-angle-right"></i></span>',
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: !1
            }
        }]
    }), $(".Video-popup").magnificPopup({
        type: "iframe"
    }), $(".testimonial-slied").slick({
        dots: !0,
        infinite: !0,
        speed: 800,
        autoplay: !0,
        autoplaySpeed: 5e3,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: !1,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    }), $(".patnar-slied").slick({
        dots: !1,
        infinite: !0,
        autoplay: !0,
        autoplaySpeed: 5e3,
        speed: 800,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: !1,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }]
    }), $(window).on("scroll", function(s) {
        $(this).scrollTop() > 600 ? $(".back-to-top").fadeIn(200) : $(".back-to-top").fadeOut(200)
    }), $(".back-to-top").on("click", function(s) {
        s.preventDefault(), $("html, body").animate({
            scrollTop: 0
        }, 1500)
    }), $(".counter").counterUp({
        delay: 10,
        time: 3e3
    }), $(".student-slied").slick({
        dots: !1,
        infinite: !0,
        autoplay: !0,
        autoplaySpeed: 5e3,
        speed: 800,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: !1
    }), $("select").niceSelect(), $("[data-countdown]").each(function() {
        var s = $(this),
            e = $(this).data("countdown");
        s.countdown(e, function(e) {
            s.html(e.strftime('<div class="count-down-time"><div class="singel-count"><span class="number">%D :</span><span class="title">Days</span></div><div class="singel-count"><span class="number">%H :</span><span class="title">Hours</span></div><div class="singel-count"><span class="number">%M :</span><span class="title">Minuits</span></div><div class="singel-count"><span class="number">%S</span><span class="title">Seconds</span></div></div>'))
        })
    }), $(".reviews-form").on("click", ".rate-wrapper .rate .rate-item", function() {
        var s = $(this),
            e = s.parent(".rate");
        e.addClass("selected"), e.find(".rate-item").removeClass("active"), s.addClass("active")
    }), $('input[type="number"]').niceNumber({
        buttonDecrement: "<i class='fa fa-sort-asc' ></i>",
        buttonIncrement: "<i class='fa fa-sort-desc' ></i>"
    }), $(".shop-items").magnificPopup({
        type: "image",
        gallery: {
            enabled: !0
        }
    })
}), jQuery(document).ready(function(s) {
    var e = s(".feedback-slider");
    e.owlCarousel({
        items: 1,
        nav: !0,
        dots: !1,
        autoHeight: !0,
        responsiveClass: !0,
        autoplay: !0,
        loop: !0,
        autoplayHoverPause: !0,
        mouseDrag: !0,
        touchDrag: !0,
        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
        responsive: {
            767: {
                nav: !0,
                dots: !1
            }
        }
    }), e.on("translate.owl.carousel", function() {
        s(".feedback-slider-item h3").removeClass("animated fadeIn").css("opacity", "0"), s(".feedback-slider-item img, .feedback-slider-thumb img, .customer-rating").removeClass("animated zoomIn").css("opacity", "0")
    }), e.on("translated.owl.carousel", function() {
        s(".feedback-slider-item h3").addClass("animated fadeIn").css("opacity", "1"), s(".feedback-slider-item img, .feedback-slider-thumb img, .customer-rating").addClass("animated zoomIn").css("opacity", "1")
    }), e.on("changed.owl.carousel", function(e) {
        var a = e.item.index,
            i = s(e.target).find(".owl-item").eq(a).prev().find("img").attr("src"),
            n = s(e.target).find(".owl-item").eq(a).next().find("img").attr("src"),
            t = s(e.target).find(".owl-item").eq(a).prev().find("span").attr("data-rating"),
            o = s(e.target).find(".owl-item").eq(a).next().find("span").attr("data-rating");
        s(".thumb-prev").find("img").attr("src", i), s(".thumb-next").find("img").attr("src", n), s(".thumb-prev").find("span").next().html(t + '<i class="fa fa-star"></i>'), s(".thumb-next").find("span").next().html(o + '<i class="fa fa-star"></i>')
    }), s(".thumb-next, .owl-next").on("click", function() {
        return e.trigger("next.owl.carousel", [300]), !1
    }), s(".thumb-prev, .owl-prev").on("click", function() {
        return e.trigger("prev.owl.carousel", [300]), !1
    })
});