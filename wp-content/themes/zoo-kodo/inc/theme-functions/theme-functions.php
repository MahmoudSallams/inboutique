<?php
/**
 * Theme functions
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

add_action('tgmpa_register', 'zoo_kodo_register_plugins', 10, 0);
if(!function_exists('zoo_kodo_register_plugins')){
    function zoo_kodo_register_plugins() {

        $plugins = array(
            array(
                'name'      => esc_html__( 'WPBakery Page Builder', 'zoo-kodo' ),
                'slug'      => 'js_composer',
                'required'  => true,
                'source'    => 'js_composer.zip',
                'version'   => '5.4.5'
            ),

            array(
                'name'      => esc_html__( 'Slider Revolution', 'zoo-kodo' ),
                'slug'      => 'revslider',
                'required'  => true,
                'source'    => 'revslider.zip',
                'version'   => '5.4.6.4'
            ),

            array(
                'name'     => esc_html__( 'Clever Visual Composer Addon', 'zoo-kodo' ),
                'slug'     => 'clever-vc-addon',
                'required' => true,
                'source'   => 'clever-vc-addon.zip',
                'version'  => '1.0.0'
            ),

            array(
                'name' => esc_html__( 'Clever Mega Menu', 'zoo-kodo' ),
                'slug' => 'clever-mega-menu',
                'source' => 'clever-mega-menu.zip',
                'required' => true,
                'version' => '1.0.7',
            ),

            array(
                'name'     => esc_html__( 'Contact Form 7', 'zoo-kodo' ),
                'slug'     => 'contact-form-7',
                'required' => true,
            ),

            array(
                'name'     => esc_html__( 'Meta Box', 'zoo-kodo' ),
                'slug'     => 'meta-box',
                'required' => true,
            ),

            array(
                'name' => esc_html__( 'Newsletter', 'zoo-kodo' ),
                'slug' => 'newsletter',
                'required' => true,
            ),

            array(
                'name' => esc_html__( 'Ajax Search Lite', 'zoo-kodo' ),
                'slug' => 'ajax-search-lite',
                'required' => true,
            ),        

            array(
                'name' => esc_html__( 'Instagram Shop by Snapppt', 'zoo-kodo' ),
                'slug' => 'shop-feed-for-instagram-by-snapppt',
                'required' => true,
            ),

            array(
                'name' => esc_html__( 'WooCommerce', 'zoo-kodo' ),
                'slug' => 'woocommerce',
                'required' => true,
            ),

            array(
                'name' => esc_html__( 'YITH WooCommerce Compare', 'zoo-kodo' ),
                'slug' => 'yith-woocommerce-compare',
                'required' => true,
            ),

            array(
                'name' => esc_html__( 'YITH WooCommerce Wishlist', 'zoo-kodo' ),
                'slug' => 'yith-woocommerce-wishlist',
                'required' => true,
            ),

            array(
                'name' => esc_html__( 'Currency Switcher for WooCommerce', 'zoo-kodo' ),
                'slug' => 'currency-switcher-woocommerce',
                'required' => true,
            ),
            array(
                'name' => esc_html__( 'CleverSwatches', 'zoo-kodo' ),
                'slug' => 'clever-swatches',
                'source' => 'clever-swatches.zip',
                'required' => true,
                'version' => '2.0.1',
            )
        );

        $config = array(
            'default_path' => ZOO_THEME_DIR . 'inc/plugins/',
        );

        tgmpa($plugins, $config);
    }
}


/**
 * Register features
 */
if (!function_exists('zoo_kodo_setup')) :
  function zoo_kodo_setup()
  {
      load_theme_textdomain( 'zoo-kodo', get_template_directory() . '/languages' );

      add_theme_support('title-tag');

      add_theme_support('post-thumbnails');

      add_theme_support('automatic-feed-links');

      add_theme_support('customize-selective-refresh-widgets');

      add_theme_support('post-formats', array('aside', 'gallery', 'image', 'quote', 'video', 'audio'));

      add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
      add_theme_support('custom-logo', array(
          'height' => 100,
          'width' => 400,
          'flex-height' => true,
          'flex-width' => true,
          'header-text' => array('site-title', 'site-description'),
      ));
      add_theme_support("custom-header");
      add_theme_support("custom-background");
      add_editor_style();

      register_nav_menus( array(
          'primary' => esc_html__( 'Primary Menu', 'zoo-kodo' ),
          'mobile' => esc_html__( 'Mobile Menu', 'zoo-kodo' ),
      ) );

      if ( !isset( $GLOBALS['content_width'] ) ) $GLOBALS['content_width'] = 640;
      add_theme_support('advanced-image-compression');

      add_theme_support('testimonial-post-type');
  }
endif;
add_action('after_setup_theme', 'zoo_kodo_setup');

/**
 * Register Sidebar
 **/
if ( function_exists( 'register_sidebar' ) ) {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'zoo-kodo' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    if ( zoo_kodo_option( 'zoo_header_top' ) ) {
        register_sidebar( array(
            'name'          => esc_html__( 'Topbar left', 'zoo-kodo' ),
            'id'            => 'top-left-header',
            'description'   => esc_html__( 'Add widgets here to appear in your top header left.', 'zoo-kodo' ),
            'before_widget' => '<div id="%1$s" class="top-head-widget header-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Topbar right', 'zoo-kodo' ),
            'id'            => 'top-right-header',
            'description'   => esc_html__( 'Add widgets here to appear in your top header right.', 'zoo-kodo' ),
            'before_widget' => '<div id="%1$s" class="top-head-widget header-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    }

    register_sidebar( array(
        'name'          => esc_html__( 'Menu Action', 'zoo-kodo' ),
        'id'            => 'menu-action',
        'description'   => esc_html__( 'Add widgets here to appear in your menu action.', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="menu-action-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Landing Header', 'zoo-kodo' ),
        'id'            => 'landing-header',
        'description'   => esc_html__( 'Add widgets here to appear in your langding page (disable icon header).', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="menu-action-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Top Footer', 'zoo-kodo' ),
        'id'            => 'top-footer',
        'description'   => esc_html__( 'Add widgets here to appear in your top footer.', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer #1', 'zoo-kodo' ),
        'id'            => 'main-footer-1',
        'description'   => esc_html__( 'Add widgets here to appear in your main footer 1.', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer #2', 'zoo-kodo' ),
        'id'            => 'main-footer-2',
        'description'   => esc_html__( 'Add widgets here to appear in your Main footer 2.', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer #3', 'zoo-kodo' ),
        'id'            => 'main-footer-3',
        'description'   => esc_html__( 'Add widgets here to appear in your Main footer 3.', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer #4', 'zoo-kodo' ),
        'id'            => 'main-footer-4',
        'description'   => esc_html__( 'Add widgets here to appear in your Main footer 4.', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer Layout 2', 'zoo-kodo' ),
        'id'            => 'main-footer-layout-2',
        'description'   => esc_html__( 'Add widgets here to appear in your main footer( only for footer layout 2).', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer Layout 3 #1', 'zoo-kodo' ),
        'id'            => 'main-footer-1-layout-3',
        'description'   => esc_html__( 'Add widgets here to appear in your main footer 1( only for footer layout 3).', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer Layout 3 #2', 'zoo-kodo' ),
        'id'            => 'main-footer-2-layout-3',
        'description'   => esc_html__( 'Add widgets here to appear in your Main footer 2( only for footer layout 3).', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer Layout 3 #3', 'zoo-kodo' ),
        'id'            => 'main-footer-3-layout-3',
        'description'   => esc_html__( 'Add widgets here to appear in your Main footer 3( only for footer layout 3).', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer Layout 3 #4', 'zoo-kodo' ),
        'id'            => 'main-footer-4-layout-3',
        'description'   => esc_html__( 'Add widgets here to appear in your Main footer 4( only for footer layout 3).', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer Layout 3 #5', 'zoo-kodo' ),
        'id'            => 'main-footer-5-layout-3',
        'description'   => esc_html__( 'Add widgets here to appear in your Main footer 4( only for footer layout 3).', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer Layout 4', 'zoo-kodo' ),
        'id'            => 'main-footer-layout-4',
        'description'   => esc_html__( 'Add widgets here to appear in your main footer( only for footer layout 4).', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Bottom', 'zoo-kodo' ),
        'id'            => 'bottom-footer',
        'description'   => esc_html__( 'Add widgets here to appear in your bottom footer( only for footer layout 3).', 'zoo-kodo' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    if ( class_exists( 'WooCommerce' ) ) {
        add_theme_support( 'woocommerce' );

        register_sidebar( array(
            'name'          => esc_html__( 'Shop Sidebar', 'zoo-kodo' ),
            'id'            => 'shop',
            'description'   => esc_html__( 'Add widgets here to appear in your sidebar of shop page.', 'zoo-kodo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    } else {
        unregister_sidebar( 'shop' );
    }
}
/**
 * Enqueue scripts and styles for front end.
 *
 * @since 1.0
 */

function zoo_kodo_scripts() {

    /**
     * Enqueue styles.
     *
     * @since 1.0
     */

    // Bootstrap
    wp_enqueue_style( 'bootstrap', ZOO_THEME_URI . 'assets/vendor/bootstrap/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap-select', ZOO_THEME_URI . 'assets/vendor/bootstrap-select/css/bootstrap-select.min.css' );
    if ( is_rtl() ) {
        wp_enqueue_style( 'bootstrap-rtl', ZOO_THEME_URI . 'assets/vendor/bootstrap/bootstrap-rtl.min.css' );
    }

    // FontAwesome
    if( zoo_kodo_option( 'zoo_enable_font_awesome' ) == 'on' ) {
        wp_enqueue_style( 'fontawesome', ZOO_THEME_URI . 'assets/vendor/font-awesome/css/font-awesome.min.css' );
    }

    // Cleversoft font
    wp_enqueue_style( 'font-cleversoft', ZOO_THEME_URI . 'assets/vendor/font-cleversoft/style.css' );
    wp_register_style( 'slick', ZOO_THEME_URI . 'assets/vendor/slick/slick.css' );

    if ( get_post_meta( get_the_ID(), 'zoo_site_page_toc', true ) == '1' ) {
        wp_enqueue_style( 'fullpage', ZOO_THEME_URI . 'assets/vendor/fullpage/jquery.fullPage.css' );
    }

    if ( class_exists( 'WooCommerce', false ) ) {
        wp_register_style( 'zoomove', ZOO_THEME_URI . 'assets/vendor/zoomove/zoomove.min.css' );
        wp_deregister_style('woocommerce-layout');
        wp_deregister_style('woocommerce-smallscreen');

        // Remove style don't use.
        if ( !is_product() ) {
            //Remove lightbox css if not single product
            wp_deregister_style('woocommerce_prettyPhoto_css');
        }

        // Remove font-awesome load by yith plugin
        wp_deregister_style('sb_instagram_icons');
        wp_deregister_style('yith-wcwl-font-awesome');
    }

    // Load style for child theme
    if ( is_child_theme() ) {
        wp_enqueue_style( 'zoo-kodo-parent-style', ZOO_THEME_URI . 'style.css', array(), false, 'all' );
    }

    // Main style
    wp_enqueue_style( 'zoo-kodo', get_stylesheet_uri() );

    if ( is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('enquire', ZOO_THEME_URI . 'assets/vendor/enquire/enquire.min.js', array(), false, true);
    wp_enqueue_script('bootstrap-select', ZOO_THEME_URI . 'assets/vendor/bootstrap-select/js/bootstrap-select.min.js', array('jquery-core'), false, true);
    wp_enqueue_script('paroller', ZOO_THEME_URI . 'assets/vendor/jquery.paroller.min.js', array('jquery-core'), false, true);
    if ( get_post_meta( get_the_ID(), 'zoo_site_page_toc', true ) == '1' ) {
        wp_enqueue_script('easings', ZOO_THEME_URI . 'assets/vendor/jquery.easings.min.js', array('jquery-core'), false, true);
        wp_enqueue_script('scrolloverflow', ZOO_THEME_URI . 'assets/vendor/scrolloverflow.min.js', array('jquery-core'), false, true);
        wp_enqueue_script('fullpage', ZOO_THEME_URI . 'assets/vendor/fullpage/jquery.fullPage.min.js', array('jquery-core', 'scrolloverflow'), false, true);
    }
    wp_register_script('slick', ZOO_THEME_URI . 'assets/vendor/slick/slick.min.js', array('jquery-core'), false, true);
    wp_enqueue_script('sticky', ZOO_THEME_URI . 'assets/vendor/sticky/jquery.sticky.js', array('jquery-core'), false, true);
    wp_enqueue_script('sticky-kit', ZOO_THEME_URI . 'assets/vendor/jquery.sticky-kit.min.js', array('jquery-core'), false, true);
    wp_register_script('isotope', ZOO_THEME_URI . 'assets/vendor/isotope/isotope.pkgd.min.js', array('jquery-core'), false, true);
    wp_register_script('lazyload-master', ZOO_THEME_URI . 'assets/vendor/lazyload-master/jquery.lazyload.min.js', array('jquery-core'), false, true);
    wp_register_script('countdown', ZOO_THEME_URI . 'assets/vendor/countdown/countdown.js', array('jquery-core'), false, true);
    wp_register_script('jquery-ias', ZOO_THEME_URI . 'assets/vendor/infinitescroll/jquery-ias.min.js', array('jquery-core'), false, true);
    wp_register_script('zoo-kodo', ZOO_THEME_URI . 'assets/js/theme.min.js', array('jquery-core'), false, true);

    wp_localize_script( 'zoo-kodo', 'zooScriptSettings', array(
        'ABSPATH' => ABSPATH,
        'baseDir' => ZOO_THEME_DIR,
        'baseUri' => ZOO_THEME_URI,
        'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) )
    ));

    if ( class_exists('WooCommerce', false) ) {
        wp_register_script('zoomove', ZOO_THEME_URI . 'assets/vendor/zoomove/zoomove.min.js', array('jquery-core'), false, true);
        wp_enqueue_script('zoo-ajax-cart', ZOO_THEME_URI . 'assets/js/ajax-cart.min.js', array('jquery-core'), false, true);
        wp_enqueue_script('zoo-woocommerce', ZOO_THEME_URI . 'assets/js/woocommerce.min.js', array('jquery-core'), false, true);
    }

    wp_enqueue_script('zoo-kodo');
}
add_action( 'wp_enqueue_scripts', 'zoo_kodo_scripts' );

/**
 * Remove Script Version
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( !function_exists( 'zoo_remove_script_version' ) ) {
    function zoo_remove_script_version( $src ) {
        if ( strpos( $src, $_SERVER['SERVER_NAME'] ) != false ) {
            $parts = explode( '?', $src );
            return $parts[0];
        } else {
            return $src;
        }
    }
}
add_filter( 'script_loader_src', 'zoo_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'zoo_remove_script_version', 15, 1 );

/**
 * Kirki google fonts.
 *
 */
if ( !function_exists( 'zoo_kirki_google_fonts' ) ) {
    function zoo_kirki_google_fonts() {
        $fonts = include wp_normalize_path(get_template_directory() . '/inc/theme-functions/webfonts.php');

        $google_fonts = array();
        if (is_array($fonts)) {
            foreach ($fonts['items'] as $font) {
                $google_fonts[$font['family']] = array(
                    'label' => $font['family'],
                    'variants' => $font['variants'],
                    'subsets' => $font['subsets'],
                    'category' => $font['category'],
                );
            }
        }

        return $google_fonts;
    }
}
add_filter( 'kirki/fonts/google_fonts', 'zoo_kirki_google_fonts', 1 );

if ( !function_exists( 'zoo_custom_import_fonts' ) ) {
    function zoo_custom_import_fonts( array $list_fonts, $wp_load = true ) {
        $fonts_url = '';
        $subsets = $font_families = $google_fonts = $family_variants = array();
        $subsets[] = 'latin';
        $subsets[] = 'latin-ext';
        $subset = esc_html_x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'zoo-kodo');

        if ( !empty( $list_fonts ) ) {

            $fonts = include wp_normalize_path(get_template_directory() . '/inc/theme-functions/webfonts.php');

            foreach ($list_fonts as $font) {
                if ($font!= '') {
                    if (is_array($font)) {
                        if ('cyrillic' == $subset) {
                            $subsets[] = 'cyrillic';
                            $subsets[] = 'cyrillic-ext';
                        } elseif ('greek' == $subset) {
                            $subsets[] = 'greek';
                            $subsets[] = 'greek-ext';
                        } elseif ('devanagari' == $subset) {
                            $subsets[] = 'devanagari';
                        } elseif ('vietnamese' == $subset) {
                            $subsets[] = 'vietnamese';
                        }

                        $font_families[] = $font['font-family'];
                    } else {
                        $fonts[] = $font;
                    }
                }
            }

            $font_families = array_unique( $font_families );

            $google_fonts = zoo_kirki_google_fonts();

            foreach ($font_families as $font_family ) {

                $google_font = $google_fonts[$font_family];

                $variants = $google_font['variants'];
                if ( is_array( $variants ) ) {
                    $family_variants[] = $font_family . ':' . implode(',', $variants);
                } else {
                  $family_variants[] = $font_family . ':' . $variants;
                }

            }

            if( $wp_load ) {
                $fonts_url = add_query_arg(array(
                    'family' => implode('|', $family_variants),
                    'subset' => implode(',', $subsets),
                ), 'https://fonts.googleapis.com/css');
            } else {
                $fonts_url = add_query_arg(array(
                    'family' => urlencode(implode('|', $family_variants)),
                    'subset' => urlencode(implode(',', $subsets)),
                ), 'https://fonts.googleapis.com/css');
            }
        }

        return $fonts_url;
    }
}

/**
 * Custom comments.
 *
 */
if ( !function_exists( 'zoo_custom_comments' ) ) {
    function zoo_custom_comments( $comment, $args, $depth ) {

        $GLOBALS['comment'] = $comment;
        $GLOBALS['comment_depth'] = $depth;

        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo ent2ncr( $tag ) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
        <?php endif; ?>
            <div class="comment-wrap clearfix">
                <?php if (empty($comment->comment_type)) : ?>
                    <div class="comment-avatar">
                        <?php if ( function_exists( 'get_avatar' ) ) {
                            echo wp_kses( get_avatar( $comment, '55' ), array( 'img' => array( 'class' => array(), 'width' => array(), 'height' => array(), 'alt' => array(), 'src' => array() ) ) );
                        } ?>
                    </div>

                    <div class="comment-content">
                        <div class="comment-meta">
                            <?php
                            printf('<h6 class="author-name">%1$s</h6>',
                                get_comment_author_link()
                            );
                            echo '<span class="date-post">' . esc_html( get_comment_date( '', get_comment_ID() ) ) . '</span>';
                            ?>
                        </div>
                        <?php if ($comment->comment_approved == '0') wp_kses( __( "\t\t\t\t\t<span class='unapproved'>" . esc_html__( 'Your comment is awaiting moderation.', 'zoo-kodo' ) . "</span>\n", 'zoo-kodo'), array( 'span' => array( 'class' => array() ) ) ); ?>
                        <div class="comment-body">
                            <?php comment_text() ?>
                        </div>
                        <div class="comment-meta-actions">
                            <?php
                            edit_comment_link( esc_html__( 'Edit', 'zoo-kodo' ), '<span class="edit-link">', '</span>' );
                            ?>
                            <?php if ( $args['type'] == 'all' || get_comment_type() == 'comment') {
                                comment_reply_link( array_merge( $args, array(
                                    'reply_text' => esc_html__( 'Reply', 'zoo-kodo' ),
                                    'login_text' => esc_html__( 'Log in to reply.', 'zoo-kodo' ),
                                    'depth' => $depth,
                                    'before' => '<span class="comment-reply">',
                                    'after' => '</span>'
                                ) ) );
                            } ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="comment-content">
                        <?php echo get_comment_author_link();?>
                        <div class="comment-meta-actions">
                            <?php
                            edit_comment_link( esc_html__( 'Edit', 'zoo-kodo' ), '<span class="edit-link">', '</span>' );
                            ?>
                            <?php if ( $args['type'] == 'all' || get_comment_type() == 'comment') {
                                comment_reply_link( array_merge( $args, array(
                                    'reply_text' => esc_html__( 'Reply', 'zoo-kodo' ),
                                    'login_text' => esc_html__( 'Log in to reply.', 'zoo-kodo' ),
                                    'depth' => $depth,
                                    'before' => '<span class="comment-reply">',
                                    'after' => '</span>'
                                ) ) );
                            } ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php if ( 'div' != $args['style'] ) : ?>
        </div>
        <?php endif; ?>
    <?php }
}

/**
 * Determine whether blog/site has more than one category.
 *
 * @return bool True of there is more than one category, false otherwise.
 */
if ( !function_exists( 'zoo_categorized_blog' ) ) {
    function zoo_categorized_blog() {
        if ( false === ( $all_the_cool_cats = get_transient( 'zoo_categories' ) ) ) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories( array(
                'fields'     => 'ids',
                'hide_empty' => 1,

                // We only need to know if there is more than one category.
                'number'     => 2,
            ) );

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count( $all_the_cool_cats );

            set_transient( 'zoo_categories', $all_the_cool_cats );
        }

        if ( $all_the_cool_cats > 1 || is_preview() ) {
            // This blog has more than 1 category so zoo_categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so zoo_categorized_blog should return false.
            return false;
        }
    }
}
/**
 * Flush out the transients used in {@see zoo_categorized_blog()}.
 */
if ( !function_exists( 'zoo_category_transient_flusher' ) ) {
    function zoo_category_transient_flusher() {
        // Like, beat it. Dig?
        delete_transient( 'zoo_categories' );
    }
}
add_action( 'edit_category', 'zoo_category_transient_flusher' );
add_action( 'save_post',     'zoo_category_transient_flusher' );

if ( ! function_exists( 'zoo_entry_meta' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags.
     *
     * @since Twenty Fifteen 1.0
     */
    function zoo_entry_meta() {
        if ( is_sticky() && is_home() && ! is_paged() ) {
            printf( '<span class="sticky-post">%s</span>', esc_html__( 'Featured', 'zoo-kodo' ) );
        }

        $format = get_post_format();
        if ( current_theme_supports( 'post-formats', $format ) ) {
            printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
                sprintf( '<span class="screen-reader-text">%s </span>', esc_html_x( 'Format', 'Used before post format.', 'zoo-kodo' ) ),
                esc_url( get_post_format_link( $format ) ),
                get_post_format_string( $format )
            );
        }

        if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
            $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }

            $time_string = sprintf( $time_string,
                esc_attr( get_the_date( 'c' ) ),
                get_the_date(),
                esc_attr( get_the_modified_date( 'c' ) ),
                get_the_modified_date()
            );

            printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
                esc_html_x( 'Posted on', 'Used before publish date.', 'zoo-kodo' ),
                esc_url( get_permalink() ),
                $time_string
            );
        }

        if ( 'post' == get_post_type() ) {
            if ( is_singular() || is_multi_author() ) {
                printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
                    esc_html_x( 'Author', 'Used before post author name.', 'zoo-kodo' ),
                    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                    get_the_author()
                );
            }

            $categories_list = get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'zoo-kodo' ) );
            if ( $categories_list && zoo_categorized_blog() ) {
                printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                    esc_html_x( 'Categories', 'Used before category names.', 'zoo-kodo' ),
                    $categories_list
                );
            }

            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'zoo-kodo' ) );
            if ( $tags_list ) {
                printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                    esc_html_x( 'Tags', 'Used before tag names.', 'zoo-kodo' ),
                    $tags_list
                );
            }
        }

        if ( is_attachment() && wp_attachment_is_image() ) {
            // Retrieve attachment metadata.
            $metadata = wp_get_attachment_metadata();

            printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
                esc_html_x( 'Full size', 'Used before full size attachment link.', 'zoo-kodo' ),
                esc_url( wp_get_attachment_url() ),
                $metadata['width'],
                $metadata['height']
            );
        }

        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            /* translators: %s: post title */
            comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'zoo-kodo' ), get_the_title() ) );
            echo '</span>';
        }
    }
endif;

/**
 * Add custom image size
 */
add_image_size( 'zoo_kodo_370_250', 370, 250, true );
add_image_size( 'zoo_kodo_370_650', 370, 650, true );
add_image_size( 'zoo_kodo_770_370', 770, 370, true );
