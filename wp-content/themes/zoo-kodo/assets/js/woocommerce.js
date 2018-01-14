(function($) {
    'use strict';

    $(document).ready(function() {
        initCarousel();
        initZoom();
        woo_custom_share();
        zoo_variable_with_gallery();

        $(document).bind('cleverswatch_update_gallery', function (event, response) {
            setTimeout(function () {

            if(!$('#zoo-quickview-lb')[0]) {
                $('.woocommerce-main-image').ZooMove();
                initCarousel();

            }else{
                woo_custom_share();
                $('.woocommerce-main-image').ZooMove();
                $('#zoo-quickview-lb .single-product-image.zoo-slick').removeAttr('data-slick');
                $('#zoo-quickview-lb .zoo-slick').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            }                     
            }, 500);
        });
        // Product qty
        $(document).zoo_CartQuantity('.quantity .qty-nav');

        //Cookie
        function setCookie(cname, cvalue) {
            document.cookie = cname + "=" + cvalue + "; ";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function eraseCookie(name) {
            createCookie(name, "", -1);
        }

        enquire.register("screen and (max-width: 768px)", {
            match: function() {
                // Tab on mobile
                if ($('.vc_tta-container[data-vc-action="collapse"] > h2').length) {
                    $('.vc_tta-container[data-vc-action="collapse"] > h2').on('click', function() {
                        $(this).toggleClass('open');
                        $(this).parent().find('.vc_tta-tabs-container').slideToggle();
                    });
                }

                // Tab in single product
                $('.wc-tabs-wrapper').each(function() {
                    $(this).find('.wc-tabs-panel-wrap').first().find('.wc-tab-title .tab-title').addClass('active');
                });

                $('body').on('click', '.wc-tab-title a', function(e) {
                    e.preventDefault();
                    var $tab = $(this);
                    var $tabs_wrapper = $tab.closest('.wc-tabs-wrapper');
                    var $tabs = $tabs_wrapper.find('.wc_tab_title');

                    $tabs_wrapper.find('.tab-title').removeClass('active');
                    $tabs_wrapper.find('.wc-tab').hide();

                    $tab.closest('.tab-title').addClass('active');
                    $tabs_wrapper.find($tab.attr('href')).show();
                });
            }
        });

        $(document).on('click', '.wrap-cart-coupon .heading-coupon', function () {
            $('.wrap-cart-coupon .custom-coupon').slideToggle();
        });

        if ( $('.shipping-cal').length ) {
            $('.shipping-cal').each(function() {
                var self = this;
                $(this).find('.shipping-calculator-button').on('click', function() {
                    $(self).toggleClass('active');
                });
            });
        }

        if ($('.woocommerce-ordering select').length && $('#hide-span').length) {
            $('.woocommerce-ordering select').width( $('#hide-span').html($('.woocommerce-ordering select').find(":selected").text()).width());

            $('.woocommerce-ordering select').change(function(){
                $(this).width( $('#hide-span').html($(this).find(":selected").text()).width());
            });
        }

        // Woo column
        if ($('.layout-control-column')[0]) {
            var query = "(min-width: 992px)",
                query992 = "(min-width: 767px) and (max-width: 992px)",
                query768 = "(min-width: 479px) and (max-width: 768px)",
                query480 = "screen and (max-width: 480px)",
                handler = {
                    match: function() {
                        $('.layout-control-column li').each(function() {

                            $(this).removeClass('active');
                            $(this).css('display', 'inline-block');

                            if ($(this).attr('data-column') == 1) {
                                $(this).css('display', 'none');
                            }

                            $('.products').each(function() {
                                var $this = $(this);
                                var wrap_w = $this.outerWidth();
                                var item_w = $(this).data('width');

                                if (item_w) {
                                    var col_active = 1;

                                    col_active = Math.floor(wrap_w / item_w);

                                    $('.layout-control-column li').each(function() {
                                        if ($(this).attr('data-column') === col_active.toString()) {
                                            $(this).addClass('active');
                                        }
                                    });
                                }
                            });

                        });
                    }
                },
                handler992 = {
                    match: function() {
                        $('.layout-control-column li').each(function() {

                            $(this).removeClass('active');
                            $(this).css('display', 'inline-block');

                            if ($(this).attr('data-column') == 3) {
                                $(this).addClass('active');
                            }

                            if ($(this).attr('data-column') == 1) {
                                $(this).css('display', 'none');
                            }

                        });
                    }
                },
                handler768 = {
                    match: function() {
                        $('.layout-control-column li').each(function() {

                            $(this).removeClass('active');
                            $(this).css('display', 'inline-block');

                            if ($(this).attr('data-column') == 3) {
                                $(this).addClass('active');
                            }

                            if ($(this).attr('data-column') == 4 || $(this).attr('data-column') == 5) {
                                $(this).css('display', 'none');
                            }
                        });
                    }
                },

                handler480 = {
                    match: function() {
                        $('.layout-control-column li').each(function() {

                            $(this).removeClass('active');
                            $(this).css('display', 'inline-block');

                            if ($(this).attr('data-column') == 2) {
                                $(this).addClass('active');
                            }

                            if ($(this).attr('data-column') == 3 || $(this).attr('data-column') == 4 || $(this).attr('data-column') == 5) {
                                $(this).css('display', 'none');
                            }
                        });
                    },
                    unmatch: function() {

                    }
                };

            enquire.register(query, handler);
            enquire.register(query992, handler992);
            enquire.register(query768, handler768);
            enquire.register(query480, handler480);
        }

        $(document).on('click', '.layout-control-column li', function() {
            $('.layout-control-column li').removeClass('active');
            $(this).addClass('active');

            var data_col = $(this).attr('data-column');
            $('.products').zoo_WooSmartLayout();

            if ($('.products.isotope').length) {
                setTimeout(function() {
                    $('.products.isotope').isotope({
                        layoutMode: 'fitRows'
                    });
                }, 400);
            }

        });

        $('.products').zoo_WooSmartLayout();

        //Ajax change layout
        jQuery('.wrap-product-page').bind('DOMNodeInserted DOMNodeRemoved', function(event) {
            $('.products').zoo_WooSmartLayout();
        });

        // Quickview js
        $(document).on('zoo_woo_quickview', function() {
            var $this = $(this);

            $this.on('click', '.quick-view.btn', function(e) {
                e.preventDefault();

                var $this = $(this);
                var load_product_id = $this.attr('data-product_id');
                var data = {
                    action: 'zoo_quickview',
                    product_id: load_product_id
                };

                $this.parent().addClass('qv-loading');
                $('body').find('#quick-view-before-loading').addClass('active');

                $.ajax({
                    url: zooScriptSettings.ajaxurl,
                    data: data,
                    type: "POST",
                    success: function(response) {
                        $('body').append(response);
                        $('.quantity .qty-nav').zoo_CartQuantity();
                        $('body').find('#quick-view-before-loading').removeClass('active');
                        $this.parent().removeClass('qv-loading');
                        var form_variation = $(document).find('#zoo-quickview-lb .variations_form');
                        form_variation.wc_variation_form();
                        form_variation.trigger('check_variations');
                        initCarousel();
                        woo_custom_share();
                        $('.woocommerce-main-image').ZooMove();
                        setTimeout(function() {
                            $('#zoo-quickview-lb,.zoo-quickview-mask').css('opacity', '1');
                        }, 10);
                    }
                });
            });

            $this.on('click', '.zoo-quickview-mask, .close-quickview', function() {
                zoo_remove_qv_lb();
                $('body').removeClass('woo-share-active');
            });

            $this.on('click', '#zoo-quickview-lb .woocommerce-main-image', function(e) {
                e.preventDefault();
            });

        }).trigger('zoo_woo_quickview');

        function zoo_remove_qv_lb() {
            $('.zoo-quickview-mask').css('opacity', '0');
            $('#zoo-quickview-lb').css({
                'top': 'calc(50% + 150px)',
                'opacity': '0'
            });
            setTimeout(function() {
                $('#zoo-quickview-lb').remove();
                $('.zoo-quickview-mask').remove();
            }, 500)
        }

        // Sidebar control
        $('.mask-sidebar, .close-sidebar').on('click', function(e) {
            e.preventDefault();
            $('.disable-sidebar').removeClass('disable-sidebar');
            $('.sidebar-control>a').removeClass('active');
        });

        $('.sidebar-control>a').on('click', function(e) {
            e.preventDefault();
            if ($('.zoo-woo-page.disable-sidebar')[0]) {
                if ($(window).width() > 768) {
                    setCookie('sidebar-status', false);
                }
                $('.zoo-woo-page').removeClass('disable-sidebar');
            } else {
                $('.zoo-woo-page').addClass('disable-sidebar');
                if ($(window).width() > 768) {
                    setCookie('sidebar-status', true);
                }
            }

            $('.sidebar-control>a').toggleClass('active');

            if ($(window).width() > 768) {
                setTimeout(function() {
                    $('.products').zoo_WooSmartLayout();
                }, 400);

                if (typeof $.fn.isotope !== 'undefined' && $('.products.isotope').length) {
                    setTimeout(function() {
                        $('.products.isotope').isotope({
                            layoutMode: 'fitRows'
                        });
                    }, 800);
                }
            }
        });
        //Accordion tab
        if ($('.image-center .zoo-woo-tabs,.sticky-accordion .zoo-woo-tabs')[0]) {
			$('.image-center #tab-description,.sticky-accordion #tab-description').parent().find('.wc-tab-title').addClass('on-first');
            $('.image-center .zoo-woo-tabs .wc-tab-title,.sticky-accordion .zoo-woo-tabs .wc-tab-title').click(function(e) {
				e.preventDefault();
				var $this = $(this);
				$this.removeClass('on-first');
				$this.parents().find('.on').removeClass('on');
                $this.parents().find('.on-first').removeClass('on-first');
                $this.toggleClass('on');
				$this.parent().parent().find('.panel').removeClass('show');
				$this.parent().parent().find('.panel').slideUp();
				$this.next().toggleClass('show');
				
                
			});
        }

        // For switch shop layout
        jQuery('.layout-control').on("click", function() {
            jQuery('.layout-control.active').removeClass('active');
            jQuery(this).addClass('active');
            var layout;
            if (jQuery(this).hasClass('list-layout')) {
                layout = 'list';
                jQuery('.products').removeClass('grid').addClass('list');
            } else {
                layout = 'grid';
                jQuery('.products').removeClass('list').addClass('grid');
            }
            $('.products').zoo_WooSmartLayout();
            setCookie('product-layout', layout);

            if ($('.products.isotope').length) {
                setTimeout(function() {
                    $('.products.isotope').isotope({
                        layoutMode: 'fitRows'
                    });
                }, 400);
            }
        });

        function zoo_variable_with_gallery() {

            // Custom attribute product
            if ( $( '.zoo-attr-custom-attribute > li.selected' ).length ) {
                $( '.zoo-attr-custom-attribute > li.selected' ).each(function(){
                    if ( typeof $( this ).data( 'color' ) !== typeof undefined && $( this ).data( 'color' ) !== false ) {
                        $( this ).closest( 'tr' ).find('td.label .selected').css( { 'color': $( this ).data( 'color' ) });
                    }
                });
            }

            $( '.zoo-attr-custom-attribute > li' ).live( 'click', function(e) {
                e.preventDefault();

                var variation_value = $(this).data( 'value' ),
                    variation_name  = $(this).data( 'name' ),
                    selectId        = $(this).parent().data( 'attribute' ),
                    select          = $( 'select#'+selectId );

                $(this).addClass( 'selected' ).siblings().removeClass( 'selected' );
                if ( $(this).closest( 'tr' ).find('td.label .selected').length ) {
                    $(this).closest( 'tr' ).find('td.label .selected').html(variation_name);
                    if ( typeof $( this ).data( 'color' ) !== typeof undefined && $( this ).data( 'color' ) !== false ) {
                        $( this ).closest( 'tr' ).find('td.label .selected').css( { 'color': $( this ).data( 'color' ) });
                    }
                }

                console.log(variation_value);
                select.val( variation_value ).trigger( 'change' );
            } );

            $( '.variations_form' ).live( 'change', 'select[data-attribute_name]', function() {
                // Auto select option thas has only 1 choice availible
                setTimeout( function() {
                    $( '.variations_form select[data-attribute_name]' ).each( function( i, e ) {
                        if ( $( e ).val() == '' && $( e ).children( '[value!=""]' ).length == 1 ) {
                            $( e ).val( $( e ).children( '[value!=""]' ).attr( 'value' ) ).trigger( 'change' );
                        }
                    } );
                }, 50 );

                $( '.zoo-attr-custom-attribute[data-attribute]' ).each( function( i, e ) {
                    ( function( e ) {
                        setTimeout( function() {
                            var option = $( e ).attr( 'data-attribute' ),
                                select = $( '#' + option );

                            $( e ).children().each( function( i2, e2 ) {
                                if ( select.children( '[value="' + $( e2 ).attr( 'data-value' ) + '"]' ).length == 1 ) {
                                    $( e2 ).show();
                                } else {
                                    $( e2 ).hide();
                                }
                            } );
                        }, 50 );
                    } )( e );
                } );
            } );

            $( 'a.reset_variations' ).live( 'click',  function() {
                $(this).parent().parent().parent().find('td.label .selected').html('');
                $( '.zoo-attr-custom-attribute' ).each( function( i, e ) {
                    $( e ).find( 'li.selected' ).removeClass( 'selected' );
                } )
            } );

            if ($('.single-product-gallery').length) {
                var main_image_wrap = $('.single-product-gallery').find('.single-product-image');
                var thumbnail_wrap = $('.single-product-gallery').find('.single-product-thumbnails');

                $(document).on('show_variation', 'form.variations_form', function (event, variation) {

                    if (variation.image.full_src != '') {
                       var new_image = variation.image.full_src;

                       main_image_wrap.find('.slick-active img').attr('src', new_image);
                       main_image_wrap.find('.slick-active img').attr('srcset', new_image);
                       main_image_wrap.find('.slick-active').attr('href', new_image);
                       main_image_wrap.find('.slick-active .zoo-img').css('background-image','url(' + new_image + ')');
                    }
               }).trigger('show_variation');
            }
        }

        // For resize window
        $(window).resize(function() {
            setTimeout(function() {
                $('.products').zoo_WooSmartLayout();
            }, 400);

            if ($('.products.isotope')[0] && typeof $.fn.isotope !== 'undefined') {
                // if ($('.products:not(.carousel)')[0]) {
                setTimeout(function() {
                    $('.products.isotope').isotope({
                        layoutMode: 'fitRows'
                    });
                }, 800);
            }

            // Stick filter
            if ($(window).width() < 768) {
                $('#top-product-page').sticky({
                    zIndex: '1',
                    topSpacing: $('.wrap-header-block').outerHeight()
                });
            } else {
                if ($('#top-product-page-sticky-wrapper')[0]) {
                    $('#top-product-page').unstick();
                }
            }
            // Clear cookie sidebar in mobile
            if ($(window).width() < 769) {
                if ($('.zoo-woo-page')[0]) {
                    setCookie('sidebar-status', '');
                    $('.disable-sidebar').removeClass('disable-sidebar');
                    $('.zoo-woo-sidebar').css('margin', '0');
                }
            }
            // Sidebar toogle
            if ($('.zoo-woo-page')[0]) {
                if ($('#primary').offset().left < 290) {
                    $('.zoo-woo-page.sidebar-onscreen').removeClass('sidebar-onscreen');
                } else {
                    $('.zoo-woo-page:not(.sidebar-onscreen)').addClass('sidebar-onscreen');
                }
            }

            // Stick gallery
            if ($('.wrap-top-single-product')[0]) {
                if ($(window).width() < 769) {
                    $('.wrap-top-single-product.sticky .wrap-single-carousel:not(.slick-slider)').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        swipe: true,
                        rtl: $('body.rtl')[0] ? true : false,
                        prevArrow: '<span class="rit-carousel-btn prev-item"><i class="cs-font clever-icon-arrow-left-1"></i></span>',
                        nextArrow: '<span class="rit-carousel-btn next-item "><i class="cs-font clever-icon-arrow-right-1"></i></span>',
                    });
                } else {
                    $('.wrap-top-single-product.sticky .wrap-single-carousel.slick-slider').slick('destroy');
                }
            }
        });



        /* WooCommerce Form Login */
        $('.btn-show-register').on('click', function(e) {
            e.preventDefault();
            $('.login.form').slideUp();
            $('.register.form').slideDown();
        });
        $('.btn-show-login').on('click', function(e) {
            e.preventDefault();
            $('.login.form').slideDown();
            $('.register.form').slideUp();
        });

        /* CVCA Product */
        var $cvcaProdWrap = $('.cvca-products-wrap');

        if ($cvcaProdWrap.length) {
            $cvcaProdWrap.each(function() {

                if ($('.vc_tta-container[data-vc-action="collapse"] .cvca-toggle-filters').length) {
                    $('.vc_tta-container[data-vc-action="collapse"]').find(this).find('.cvca-toggle-filters').each(function() {
                        var self = $(this);
                        $(this).closest('.vc_tta-container').find('a[href="#' + $(this).closest('.vc_tta-panel').attr('id') + '"]').on('click', function() {
                            // self.next('.cvca-wrap-filters').hide();
                            self.add(self.next('.cvca-wrap-filters')).removeClass('active');
                        });
                    });
                }

                if ($('.cvca-toggle-filters').length) {
                    $(this).find('.cvca-toggle-filters').each(function() {

                        // $(this).next('.cvca-wrap-filters').hide();
                        $(this).add($(this).next('.cvca-wrap-filters')).next('.cvca-wrap-filters').removeClass('active');

                        $(this).on('click', function() {
                            // $(this).next('.cvca-wrap-filters').toggle();
                            $(this).add($(this).next('.cvca-wrap-filters')).toggleClass('active');
                        });
                    });
                }

                $(this).find('.cvca-wrap-filters .cvca-ajax-load a').on('click', function(e) {
                    e.preventDefault();
                    shopScrollTo($cvcaProdWrap);
                });
            });
        }

    });

    $(window).on('load', function() {
        //Sticky product
        $('.sticky.zoo-single-product').zoo_stickyproduct();
    });

    function shopScrollTo(wrap) {
        var cvcaProdPosition = Math.round(wrap.offset().top - 30);

        $('html, body').animate({'scrollTop': cvcaProdPosition}, 200);
    }

    function woo_custom_share() {
        if ($('.woo-custom-share').length) {
            var wooShare = $('.woo-custom-share');

            wooShare.find('.woo-share-label').on('click', function() {
                wooShare.find('.woo-share-icons').addClass('active');
                $('body').addClass('woo-share-active');
            });

            wooShare.find('.woo-share-icons').on('click', function() {
                $(this).removeClass('active');
                $('body').removeClass('woo-share-active');
            });

            wooShare.find('.woo-share-close').on('click', function() {
                $(this).closest('.woo-custom-share').find('.woo-share-icons').removeClass('active');
                $('body').removeClass('woo-share-active');
            });

        }
    }

    function initZoom() {
        if ($('.zoo-product-zoom')[0]) {
            $('.zoo-product-zoom .single-product-gallery .zoom').ZooMove();
        }
    }

    function initCarousel() {
        if (typeof $.fn.slick !== 'undefined' && $('.zoo-slick').length) {
                $('.zoo-slick').not('.slick-initialized').slick(); 
        }
    }
    //product lightbox
    $(document).on('click', '.woocommerce-main-image', function (e) {
        e.preventDefault();
        if(!$('#zoo-quickview-lb')[0]){
            var pswpElement = $('.pswp')[0],
            items = $(this).zoogetGalleryItems(),
            c_index = $(this).index();
            if ($(this).hasClass('slick-slide')) {
                if ($('.carousel.zoo-single-product')[0]) {
                    var total_sl_active = $('.wrap-single-image .slick-active').length;
                    if (total_sl_active == 0) {
                        c_index = $(this).index();
                    }
                    else {
                        c_index = $(this).index() - total_sl_active - 1;
                    }
                }
                else {
                    c_index = $(this).index() - 1;
                }

           }
            var options = {
                index: c_index,
                shareEl: false,
                closeOnScroll: false,
                history: false,
                hideAnimationDuration: 0,
                showAnimationDuration: 0
            };
            // Initializes and opens PhotoSwipe.
            var photoswipe = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
            photoswipe.init();
        }
    });

    jQuery.fn.extend({
        zoo_WooSmartLayout: function() {
            if ($(this)[0]) {
                $(this).each(function() {
                    var col;
                    var $this = $(this);
                    var wrap_w = $this.outerWidth();
                    var res = '';
                    if ($this.find('.lazy-img')[0]) {
                        res = $this.find('.lazy-img').parent().data('resolution');
                    }
                    var item_w = $(this).data('width');
                    if ($('.layout-control-column')[0]) {
                        var col = $('.layout-control-column').find('li.active').attr('data-column');

                        item_w = Math.floor(wrap_w / col);
                    }
                    if ($this.hasClass('grid')) {
                        if (item_w) {
                            if ($(window).width() > 220) {
                                col = Math.floor(wrap_w / item_w);
                            } else {
                                col = 1;
                            }
                            var col_w = Math.floor(wrap_w / col);
                            $this.find('.product').outerWidth(col_w - 0.5);
                        }

                        if (res != '') {
                            var w = $this.find('.product').width();
                            $this.find('.lazy-img').parent().outerWidth(w).height(w / res);
                        }
                    }

                    if ($this.hasClass('list')) {
                        $this.find('.product').outerWidth(wrap_w);
                        if (res != '') {
                            var w = $this.find('.product').width() * 0.25;
                            $this.find('.lazy-img').parent().outerWidth(w).height(w / res);
                        }
                    }

                    if (item_w && $this.hasClass('isotope')) {
                        $this.isotope({
                            layoutMode: 'fitRows',
                            masonry: {
                                columns: col
                            }
                        });
                    }

                    $this.find('.lazy-img').zoo_lazyImg();

                })
            }
        },
        //Lazy Img Config
        zoo_lazyImg: function() {
            if ($(this)[0]) {
                $(this).not('.loaded').parent().addClass('loading');
                $(this).not('.loaded').lazyload({
                    effect: 'fadeIn',
                    threshold: $(window).height(),
                    load: function() {
                        $(this).parent().removeClass('loading');
                        $(this).addClass('loaded');
                    }
                });
            }
        },
        //Product Qty
        zoo_CartQuantity: function (target) {
            if ($(this)[0]) {
                $(this).on("click", target, function () {
                    var parent = jQuery(this).parents('.quantity').find('input.qty');
                    var val = parseInt(parent.val());
                    if ($(this).hasClass('increase')) {
                        parent.val(val + 1);
                    }
                    else {
                        if (val > 1) {
                            parent.val(val - 1);
                        }
                    }
                    parent.trigger('change');
                });
            }
        },
        //Sticky Product
        zoo_stickyproduct: function() {
            if ($(this)[0]) {
                var $this = $(this);
                $('.wrap-right-single-product').stick_in_parent();
                $('.image-center .zoo-woo-tabs').stick_in_parent();
            }
        },
        //Push product images to list
        zoogetGalleryItems: function () {
            var $slides = this.parents('.single-product-image').find('.woocommerce-main-image:not(.slick-cloned)'),
                items = [];
            if ($slides.length > 0) {
                $slides.each(function (i, el) {
                    var img = $(el).find('img'),
                        large_image_src = img.attr('data-large_image'),
                        large_image_w = img.attr('data-large_image_width'),
                        large_image_h = img.attr('data-large_image_height'),
                        item = {
                            src: large_image_src,
                            w: large_image_w,
                            h: large_image_h,
                            title: img.attr('title')
                        };
                    items.push(item);
                });
            }

           return items;
        }
    });

})(jQuery);
