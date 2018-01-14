//**All config js of theme
(function($) {
    'use strict';
    jQuery(document).ready(function($) {

        /* Fix rtl row full-width in visual composer */
        function zoo_fix_vc_full_width_row() {
            var $elements = $('[data-vc-full-width="true"]');
            $.each($elements, function() {
                var $el = $(this);
                $el.css('right', $el.css('left')).css('left', '');
            });
        }

        if ($('body.rtl')[0]) {
            // Fixes rows in RTL
            $(document).on('vc-full-width-row', function() {
                zoo_fix_vc_full_width_row();
            });

            // Run one time because it was not firing in Mac/Firefox and Windows/Edge some times
            zoo_fix_vc_full_width_row();
        }

        /* Bootstrap select */
        if ($('select#alg_currency_select').length) {
            $('select#alg_currency_select').selectpicker();
        }

        /* Search */
        $('.search-trigger').on('click', function() {
            $(this).toggleClass('active');
            $('.header-search-block').toggleClass('active');
            setTimeout(function() {
                $('.header-search-block.active input.ipt').focus();
            }, 100);
        });

        /* Fullpage */
        if ($('#main.page-toc').length) {
            $('#main.page-toc').fullpage({
                verticalCentered: false,
                sectionSelector: '.vc_row',
                css3: true,
                navigation: true,
                slidesNavigation: true,
                navigationPosition: 'right',
                scrollingSpeed: 1000,
                autoScrolling: true,
                fitToSection: false
            });
        }

        /* Menu action */
        if ($('.menu-action-wrap').length) {
            $('.action-trigger', '.menu-action-wrap').on('click', function() {
                $(this).parent().find('.menu-action-dropdown').addClass('active');
                $('body').addClass('menu-action-active');
            });
            $('.menu-action-wrap .menu-action-close').on('click', function() {
                $(this).closest('.menu-action-dropdown').removeClass('active');
                $('body').removeClass('menu-action-active');
            });
        }

        $('.action-mask-close').on('click', function(e) {
            e.preventDefault();
            $('body').toggleClass('menu-action-active');
        });

        if ($('.project-wrap-thumbs')[0]) {
            $('.project-wrap-thumbs').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                focusOnSelect: true,
                prevArrow: '<span class="prev-slide cp-slider-arrow"><i class="cs-font clever-icon-arrow-left-1"></i></span>',
                nextArrow: '<span class="next-slide cp-slider-arrow"><i class="cs-font clever-icon-arrow-right-1"></i></span>',
                rtl: $('body.rtl')[0] ? true : false,
                asNavFor: '.project-slider',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        }
        if ($('.project-slider')[0]) {
            $('.project-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                prevArrow: '<span class="prev-slide cp-slider-arrow"><i class="cs-font clever-icon-arrow-left-3"></i></span>',
                nextArrow: '<span class="next-slide cp-slider-arrow"><i class="cs-font clever-icon-arrow-right-3"></i></span>',
                rtl: $('body.rtl')[0] ? true : false,
                asNavFor: $('.project-wrap-thumbs')[0] ? '.project-wrap-thumbs' : ''
            });
        }

        $(".zoo-carousel").each(function() {
            var data = JSON.parse($(this).attr('data-config'));
            var item = data['item'];
            var pag = false;
            if (data['pagination'] != undefined && data['pagination'] == 'true') {
                pag = true;
            }
            var nav = false;
            if (data['navigation'] != undefined && data['navigation'] == 'true') {
                nav = true;
            }
            var wrap = data['wrap'] != undefined ? data['wrap'] : '';
            var wrapcaroul = wrap != '' ? $(this).find(wrap) : $(this);
            wrapcaroul.slick({
                slidesToShow: item,
                slidesToScroll: item > 5 ? Math.round(item / 2) : 1,
                arrows: nav,
                dots: pag,
                autoplay: true,
                prevArrow: '<span class="zoo-carousel-btn prev-item"><i class="cs-font clever-icon-arrow-left-1"></i></span>',
                nextArrow: '<span class="zoo-carousel-btn next-item "><i class="cs-font clever-icon-arrow-right-1"></i></span>',
                autoplaySpeed: 5000,
                rtl: $('body.rtl')[0] ? true : false,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: item > 4 ? 4 : item,
                        slidesToScroll: item > 4 ? 2 : 1
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }]
            });
        });

        if ($('.post-slider').length) {
            $('.post-slider').each(function() {
                $(this).slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: false,
                    autoplay: true,
                    prevArrow: '<span class="zoo-carousel-btn prev-item"><i class="cs-font clever-icon-arrow-left-1"></i></span>',
                    nextArrow: '<span class="zoo-carousel-btn next-item "><i class="cs-font clever-icon-arrow-right-1"></i></span>',
                    autoplaySpeed: 5000,
                    rtl: $('body.rtl')[0] ? true : false
                });
            });
        }

        enquire.register("screen and (min-width: 782px)", {
            match: function() {
                if ($('.sticky-wrapper').length) {
                    $('.wrap-header-block').unstick();
                }
                if ($('#wpadminbar').length) {
                    $(".sticker").sticky({
                        zIndex: '4',
                        topSpacing: 32
                    });
                } else {
                    $(".sticker").sticky({
                        zIndex: '4'
                    });
                }
            },
            unmatch: function() {
                if ($('.sticky-wrapper').length) {
                    $('.wrap-header-block').unstick();
                }

                if ($('#wpadminbar').length) {
                    $(".sticker").sticky({
                        zIndex: '4',
                        topSpacing: 46
                    });
                } else {
                    $(".sticker").sticky({
                        zIndex: '4'
                    });
                }
            }
        });

        enquire.register("screen and (max-width: 600px)", {
            match: function() {
                if ($('.sticky-wrapper').length) {
                    $('.wrap-header-block').unstick();
                }

                if ($('#wpadminbar').length) {
                    $(".sticker").sticky({
                        zIndex: '4',
                        topSpacing: 0
                    });
                } else {
                    $(".sticker").sticky({
                        zIndex: '4'
                    });
                }
            },
            unmatch: function() {

            }
        });

        $('.wrap-mobile-nav').zoo_MobileNav();

        // Lazy img
        $('.clever_wrap_lazy_img').each(function() {
            if ($(this).find('.lazy-img')[0]) {
                var res = $(this).data('resolution');
                var w = $(this).width();
                $(this).outerWidth(w).height(w / res);
                $(this).find('.lazy-img').not('.loaded').parent().addClass('loading');
                $(this).find('.lazy-img').not('.loaded').lazyload({
                    effect: 'fadeIn',
                    threshold: $(window).height(),
                    load: function() {
                        $(this).parent().removeClass('loading');
                        $(this).addClass('loaded');
                    }
                });
            }
        });

        $(window).on('load', function() {
            $('#page-load').addClass('deactive');
            $(window).resize(function() {
                //Fix position menu
                var window_w = $(window).width();
                $('.pos-left').removeClass('pos-left');
                $('#main-navigation .children, #main-navigation .sub-menu').each(function() {
                    if (window_w < parseInt($(this).offset()['left'] + $(this).width())) {
                        $(this).addClass('pos-left');
                    }
                });
            }).resize();
        });

        // Instagram widget
        if ($('.instagram-pics').length) {
            $('.instagram-pics').each(function(){
                $(this).slick({
                    slidesToShow: 6,
                    arrows: true,
                    dots: false,
                    autoplay: true,
                    prevArrow: '<span class="cvca-carousel-btn prev-item"><i class="cs-font clever-icon-arrow-left-1"></i></span>',
                    nextArrow: '<span class="cvca-carousel-btn next-item "><i class="cs-font clever-icon-arrow-right-1"></i></span>',
                    autoplaySpeed: 5000,
                    rtl: $('body.rtl')[0] ? true : false,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4
                            }
                        }, {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 3
                            }
                        }, {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            });
        }

        // Back to top
        if ($('#back-to-top').length) {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 400) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            $('#back-to-top').click(function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 1000);
                return false;
            });
        }
    });
    jQuery.fn.extend({
        zoo_MobileNav: function() {
            $(this).find('li:has("ul")>a').after('<span class="triggernav"><i class="cs-font clever-icon-plus"></i></span>');
            $('.triggernav').zoo_toggleMobileNav();

            $('#menu-mobile-trigger').on('click', function() {
                $(this).toggleClass('active');
                $('.wrap-mobile-nav').toggleClass('active');
                $('body').toggleClass('menu-active');

            });

            $('.zoo-mask, .close-nav').on('click', function(e) {
                e.preventDefault();
                if ($('.menu-active')[0]) {
                    $('#menu-mobile-trigger').toggleClass('active');
                    $('.wrap-mobile-nav').toggleClass('active');
                    $('body').toggleClass('menu-active');
                }
            });

        },
        zoo_toggleMobileNav: function() {
            $('.wrap-mobile-nav li >ul').slideUp();
            $(this).on("click", function() {
                $(this).toggleClass('active');
                $(this).next().slideDown(400);
                if (!$(this).hasClass('active')) {
                    $(this).next().slideUp(400);
                    $(this).next().find('.triggernav').removeClass('active');
                }
            });
        },
        ActiveScreen: function() {
            var itemtop, windowH, scrolltop;
            itemtop = $(this).offset().top;
            windowH = $(window).height();
            scrolltop = $(window).scrollTop();
            if (itemtop < scrolltop + windowH * 2 / 3) {
                return true;
            } else {
                return false;
            }
        }
    })
})(jQuery);
