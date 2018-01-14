jQuery(document).bind('cleverswatch_update_gallery', function (event, response) {
    if(jQuery('.cd-quick-view')[0]){
        var html = jQuery(response.content).find('.swiper-container').html();
        jQuery('.cd-quick-view .swiper-container').html(html);
        var t = new Swiper(".cd-quick-view .swiper-container", {
            pagination: ".swiper-pagination",
            nextButton: ".swiper-button-next",
            prevButton: ".swiper-button-prev",
            preventClick: !0,
            preventClicksPropagation: !0,
            grabCursor: !0,
            onTouchStart: function () {
                o = !1;
            },
            onTouchMove: function () {
                o = !1;
            },
            onTouchEnd: function () {
                setTimeout(function () {
                    o = !0;
                }, 300);
            }
        })
    }else {
        var thumb = jQuery(response.content).next('.product_thumbnails').html();
        jQuery('#product-' + response.product_id).find('.product_summary_thumbnails_wrapper .product_thumbnails').html(thumb);
        setTimeout(function () {
            jQuery(document).find('#product-' + response.product_id+' .product-images-wrapper .product_thumbnails').remove();
            if (jQuery(".product-images-carousel").length) {
                var t = new Swiper(".product-images-carousel", {
                    autoHeight: !0,
                    preloadImages: !0,
                    lazyPreloaderClass: "swiper-lazy-preloader",
                    updateOnImagesReady: !0,
                    lazyLoading: !0,
                    preventClicks: 1 != getbowtied_scripts_vars.product_lightbox ? "true" : "false",
                    preventClicksPropagation: 1 != getbowtied_scripts_vars.product_lightbox ? "true" : "false",
                    onSlideChangeEnd: function() {
                        s(t.activeIndex);
                    }
                }), i = jQuery(".product_thumbnails");
                i.on("click", ".carousel-cell", function(t) {
                    s(jQuery(t.currentTarget).index());
                });
                function s(e) {
                    t.slideTo(e, 300, !1);
                    var s = i.find(".carousel-cell"), n = i.height(), o = s.outerHeight();
                    i.find(".is-nav-selected").removeClass("is-nav-selected");
                    s.eq(t.activeIndex).addClass("is-nav-selected");
                    var a = t.activeIndex * o - (n - o) / 2 - 10;
                    i.animate({
                        scrollTop: a
                    }, 300);
                }
            }
            if (jQuery(".easyzoom").length) if (jQuery(window).width() > 1024) {
                var t = jQuery(".easyzoom").easyZoom({
                    loadingNotice: "",
                    errorNotice: "",
                    preventClicks: !1,
                    linkAttribute: "href"
                }).data("easyZoom");
            } else jQuery(".easyzoom a").click(function(e) {
                jQuery.preventDefault();
            });
        },100);
    }
});