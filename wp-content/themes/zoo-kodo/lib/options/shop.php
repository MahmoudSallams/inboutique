<?php
/**
 * Shop Panel
 *
 * @uses    object    $this          CleverTheme
 * @uses    object    $this    Clever_Customizer
 *
 * @package    Clever_Theme\Core\Backend\Customizer
 */

if (class_exists('WooCommerce')) {
    $zoo_customize->add_panel('woocommerce', array(
        'title' => esc_html__('WooCommerce', 'zoo-kodo'),
        'description' => esc_html__('WooCommerce theme options.', 'zoo-kodo'),
        'priority' => 85
    ));

    /* ----------------------------------------------------------
                        Section - Category Page
    ---------------------------------------------------------- */
    $zoo_customize->add_section('shop-archive', array(
        'title' => esc_html__('Shop Page', 'zoo-kodo'),
        'panel' => 'woocommerce',
        'description' => esc_html__('The settings for archive shop, eg: archive, shop, category...', 'zoo-kodo')
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'custom',
        'settings' => 'zoo_slider_cover_heading',
        'label' => esc_html__('', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '<h3 class="zoo-options-heading">' . esc_html__('Cover shop page', 'zoo-kodo') . '</h3>',
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'select',
        'settings' => 'zoo_shop_cover',
        'label' => esc_html__('', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => 'disable',
        'description' => esc_html__('Choose a source for shop cover on shop page', 'zoo-kodo'),
        'choices'   => array(
            'disable' => esc_html__( 'Disable', 'zoo-kodo' ),
            'category-image' => esc_html__( 'Category Image', 'zoo-kodo' ),
            'custom-image' => esc_html__( 'Custom Image', 'zoo-kodo' ),
            'slider-shortcode' => esc_html__( 'Slider shortcode', 'zoo-kodo' )
        )
    ));

    $zoo_customize->add_field( 'zoo_customizer', array(
        'type'     => 'color',
        'settings' => 'zoo_shop_cover_background_color',
        'label'    => esc_html__( 'Background Color', 'zoo-kodo' ),
        'section'  => 'color',
        'default'  => '#ccc'
    ) );

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'text',
        'settings' => 'zoo_shop_cover_height',
        'label' => esc_html__('Cover Height', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '200',
        'description' => esc_html__('Enter height for cover block on shop page', 'zoo-kodo'),
        'active_callback'  => array(
            array(
                'setting'  => 'zoo_shop_cover',
                'operator' => '!=',
                'value'    => 'disable',
            )
        )
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'image',
        'settings' => 'zoo_shop_custom_image_cover',
        'label' => esc_html__('Custom image', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '',
        'description' => esc_html__('Choose a image for shop page', 'zoo-kodo'),
        'active_callback'  => array(
            array(
                'setting'  => 'zoo_shop_cover',
                'operator' => '==',
                'value'    => 'custom-image',
            )
        )
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'text',
        'settings' => 'zoo_shop_slider_cover',
        'label' => esc_html__('Slider Shortcode', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '',
        'description' => esc_html__('Enter shortcode of rev slider for shop page', 'zoo-kodo'),
        'active_callback'  => array(
            array(
                'setting'  => 'zoo_shop_cover',
                'operator' => '==',
                'value'    => 'slider-shortcode',
            )
        )
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_shop_custom_content_cover',
        'label' => esc_html__('Custom Title and Description', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '0',
        'active_callback'  => array(
            array(
                'setting'  => 'zoo_shop_cover',
                'operator' => '!=',
                'value'    => 'disable',
            ),
            array(
                'setting'  => 'zoo_shop_cover',
                'operator' => '!=',
                'value'    => 'slider-shortcode',
            )
        )
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_aternative_images',
        'label' => esc_html__('Aternative images', 'zoo-theme'),
        'section' => 'shop-archive',
        'default' => '0',
        'description' => esc_html__('Show alternative product images on mouse hover (in category view and in product sliders)', 'zoo-theme'),
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'text',
        'settings' => 'zoo_shop_custom_title_cover',
        'label' => esc_html__('Custom title', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '',
        'description' => esc_html__('Fill custom title for cover block of shop page', 'zoo-kodo'),
        'active_callback'  => array(
            array(
                'setting'  => 'zoo_shop_cover',
                'operator' => '!=',
                'value'    => 'disable',
            ),
            array(
                'setting'  => 'zoo_shop_cover',
                'operator' => '!=',
                'value'    => 'slider-shortcode',
            ),
            array(
                'setting'  => 'zoo_shop_custom_content_cover',
                'operator' => '!=',
                'value'    => '0',
            )
        )
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'text',
        'settings' => 'zoo_shop_custom_description_cover',
        'label' => esc_html__('Custom description', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '',
        'description' => esc_html__('Fill custom description for cover block of shop page', 'zoo-kodo'),
        'active_callback'  => array(
            array(
                'setting'  => 'zoo_shop_cover',
                'operator' => '!=',
                'value'    => 'disable',
            ),
            array(
                'setting'  => 'zoo_shop_cover',
                'operator' => '!=',
                'value'    => 'slider-shortcode',
            ),
            array(
                'setting'  => 'zoo_shop_custom_content_cover',
                'operator' => '!=',
                'value'    => '0',
            )
        )
    ));

    /* Options heading - Category Box */
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'custom',
        'settings' => 'zoo_shop_page_heading',
        'label' => esc_html__('', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '<h3 class="zoo-options-heading">' . esc_html__('Shop page layout', 'zoo-kodo') . '</h3>',
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_catalog_mod',
        'label' => esc_html__('Enable Catalog Mode', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '0',
        'description' => esc_html__('If check, catalog mode will active, all button cart, icon cart will be hide, ', 'zoo-kodo')
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'radio-image',
        'settings' => 'zoo_shop_sidebar_option',
        'label' => esc_html__('Shop sidebar option', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => 'left-sidebar',
        'choices' => array(
            'no-sidebar' => esc_url(ZOO_THEME_URI. 'lib/assets/icons/no-sidebar.png'),
            'left-sidebar' => esc_url(ZOO_THEME_URI. 'lib/assets/icons/left-sidebar.png'),
            'right-sidebar' => esc_url(ZOO_THEME_URI. 'lib/assets/icons/right-sidebar.png'),
        ),
    ));
    $zoo_customize->add_field( 'zoo_customizer', array(
        'type'     => 'select',
        'settings' => 'zoo_shop_sidebar',
        'label'    => esc_html__( 'Shop Sidebar', 'zoo-kodo' ),
        'section'  => 'shop-archive',
        'choices'  => zoo_get_sidebar_options(),
        'default'  => 'shop'
    ) );
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'select',
        'settings' => 'zoo_products_layout',
        'label' => esc_html__('Products layout', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => 'grid',
        'choices' => array(
            'grid' => esc_attr__('Grid', 'zoo-kodo'),
            'list' => esc_attr__('List', 'zoo-kodo')
        ),
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'text',
        'settings' => 'zoo_products_number_items',
        'label' => esc_html__('Products per Page', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '12'
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'slider',
        'settings' => 'zoo_products_item_min_width',
        'label' => esc_html__('Item min width (px)', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '280',
        'choices' => array(
            'min' => '100',
            'max' => '500',
            'step' => '10',
        ),
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type'     => 'select',
        'settings' => 'zoo_products_pagination',
        'label'    => esc_html__( 'Shop Pagination type', 'zoo-kodo' ),
        'section'  => 'shop-archive',
        'default'  => 'numeric',
        'choices'  => array(
            'numeric'  => esc_html__('Numeric','zoo-kodo'),
            'simple'  => esc_html__('Simple','zoo-kodo'),
            'ajaxload'  => esc_html__('Ajax load more','zoo-kodo'),
            'infinity'  => esc_html__('Infinity scroll','zoo-kodo'),
        ),
    ));

    /* Options heading - Category Box */
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'custom',
        'settings' => 'zoo_products_item_heading',
        'label' => esc_html__('', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '<h3 class="zoo-options-heading">' . esc_html__('Product Item', 'zoo-kodo') . '</h3>',
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_product_cart_button',
        'label' => esc_html__('Show cart button', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '1',
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_product_sale_label',
        'label' => esc_html__('Show Sale Label', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '1',
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'select',
        'settings' => 'zoo_sale_type',
        'label' => esc_html__('Sale label type', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => 'text',
        'choices' => array(
            'number' => esc_html__('Number', 'zoo-kodo'),
            'text' => esc_html__('Text', 'zoo-kodo'),
        ),
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_product_rating',
        'label' => esc_html__('Hide Rating', 'zoo-kodo'),
        'description' => esc_html__('Rating of product will be hide', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '1',
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_product_stock_label',
        'label' => esc_html__('Hide Stock Label', 'zoo-kodo'),
        'description' => esc_html__('Stock label will be hide', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '0',
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_product_disable_qv',
        'label' => esc_html__('Disable quick view', 'zoo-kodo'),
        'description' => esc_html__('Quick view and all function require will disable', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '0',
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_product_disable_wishlist_button',
        'label' => esc_html__('Disable wishlist button', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '0',
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_product_disable_compare_button',
        'label' => esc_html__('Disable compare button', 'zoo-kodo'),
        'section' => 'shop-archive',
        'default' => '1',
    ));
    /* ----------------------------------------------------------
                        Section - Product Page
    ---------------------------------------------------------- */
    $zoo_customize->add_section('shop-single', array(
        'title' => esc_html__('Single Product Page', 'zoo-kodo'),
        'panel' => 'woocommerce',
        'description' => esc_html__('The settings for single product', 'zoo-kodo')
    ));

    /* Options heading - Layout */
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'custom',
        'settings' => 'zoo_single_layout_heading',
        'label' => esc_html__('', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => '<div class="zoo-options-heading">' . esc_html__('Layout', 'zoo-kodo') . '</div>',
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'select',
        'settings' => 'zoo_single_gallery_layout',
        'label' => esc_html__('Shop Gallery Layout', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => 'vertical-gallery',
        'choices' => array(
            'vertical-gallery' =>esc_html__('Vertical Gallery','zoo-kodo'),
            'vertical-gallery-right' =>esc_html__('Vertical Gallery Center Thumb','zoo-kodo'),
            'horizontal-gallery' =>esc_html__('Horizontal Gallery','zoo-kodo'),
            'carousel' =>esc_html__('Carousel','zoo-kodo'),
            'sticky' =>esc_html__('Sticky','zoo-kodo'),
            'sticky-right-content' =>esc_html__('Sticky Right Content','zoo-kodo'),
            'sticky-accordion' =>esc_html__('Sticky Accordion','zoo-kodo'),
            'images-center' =>esc_html__('Images Center','zoo-kodo'),
        ),
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'radio-image',
        'settings' => 'zoo_single_product_sidebar_option',
        'label' => esc_html__('Single product sidebar option', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => 'no-sidebar',
        'choices' => array(
            'no-sidebar' => esc_url(ZOO_THEME_URI. 'lib/assets/icons/no-sidebar.png'),
            'left-sidebar' => esc_url(ZOO_THEME_URI. 'lib/assets/icons/left-sidebar.png'),
            'right-sidebar' => esc_url(ZOO_THEME_URI. 'lib/assets/icons/right-sidebar.png'),
        ),
    ));
    $zoo_customize->add_field( 'zoo_customizer', array(
        'type'     => 'select',
        'settings' => 'zoo_single_product_sidebar',
        'label'    => esc_html__( 'Single product Sidebar', 'zoo-kodo' ),
        'section' => 'shop-single',
        'default' => 'shop-sidebar',
        'choices'  => zoo_get_sidebar_options(),
    ) );
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_single_product_zoom',
        'label' => esc_html__('Enable Product Zoom', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => '1',
        'description' => esc_html__('If check, zoom feature will active', 'zoo-kodo'),
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_single_link_product',
        'label' => esc_html__('Show Next and previous Product', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => '1',
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_single_share',
        'label' => esc_html__('Show Social Share', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => '1',
    ));
    /* Options heading - Related Product */
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'custom',
        'settings' => 'zoo_single_related_product_heading',
        'label' => esc_html__('', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => '<div class="zoo-options-heading">' . esc_html__('Related Product', 'zoo-kodo') . '</div>',
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_single_related_product',
        'label' => esc_html__('Show Related product', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => '1',
    ));

    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'checkbox',
        'settings' => 'zoo_single_related_product_slider',
        'label' => esc_html__('Enable slider for Related products', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => '1',
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'number',
        'settings' => 'zoo_single_related_product_number',
        'label' => esc_html__('Number items', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => '6',
    ));
    $zoo_customize->add_field('zoo_customizer', array(
        'type' => 'slider',
        'settings' => 'zoo_single_related_cols',
        'label' => esc_html__('Columns', 'zoo-kodo'),
        'section' => 'shop-single',
        'default' => '4',
        'choices' => array(
            'min' => '1',
            'max' => '6',
            'step' => '1',
        ),
    ));
}
