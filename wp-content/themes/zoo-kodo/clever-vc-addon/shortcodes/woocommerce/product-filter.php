<?php

/**
 * Product filter block
 */
if ( $atts['show_filter'] ) {
    $fitem_class = 'cvca-wrap-filter-item ';
    $col_class = '';

    switch ( $atts['filter_col'] ) {
        case '2':
            $col_class = "col-xs-12 col-sm-6";
            break;
        case '3':
            $col_class = "col-xs-12 col-sm-4";
            break;
        case '4':
            $col_class = "col-xs-12 col-sm-3";
            break;
        case '5':
            $col_class = "col-xs-12 col-sm-1-5";

            if ($atts['filter_tags'] != '') {
                $col_class = "col-xs-12 col-sm-2";
            }

            break;
        case '6':
            $col_class = "col-xs-12 col-sm-2";
            break;
        default:
            $col_class = "col-xs-12 col-sm-12";
            break;
    }

    wp_enqueue_script('cvca-ajax-product');

    // Enable search
    if ( $atts['show_search'] ) { ?>
        <label><input type="text" name="s" placeholder="<?php echo esc_html__('Product Search','zoo-kodo'); ?>"><input class="cvca_search_button" type="button" value="Search"></label>
        <div class="cvca_search_result"></div>
        <form style="display: none" role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
            <label class="screen-reader-text"
                   for="s"><?php echo esc_html__( 'Search for:', 'zoo-kodo' ); ?></label>
            <input type="search" class="search-field"
                   placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'zoo-kodo' ); ?>"
                   value="<?php echo esc_attr( get_search_query() ); ?>" name="s"
                   title="<?php echo esc_attr_x( 'Search for:', 'label', 'zoo-kodo' ); ?>"/>
            <input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'zoo-kodo' ); ?>"/>
            <input type="hidden" name="post_type" value="product"/>
        </form>
    <?php } ?>
    <div class="row">
        <?php /* Filter category */ ?>
        <?php if ( $atts['filter_categories'] != '' ) : ?>
            <div class="<?php echo esc_attr( $fitem_class.$col_class ) ?>">
                <h3 class="cvca-title-filter-item"><?php esc_html_e( 'Categories', 'zoo-kodo' ); ?></h3>
                <ul class="cvca-ajax-load cvca-list-product-category">
                    <?php
                    $product_categories = explode( ',', $atts['filter_categories'] );

                    foreach ( $product_categories as $product_cat_slug ) {
                        $product_cat = get_term_by( 'slug', $product_cat_slug, 'product_cat' );
                        $selected = '';

                        if ( isset($atts['wc_attr']['product_cat']) && $atts['wc_attr']['product_cat'] == $product_cat->slug ) {
                            $selected = 'cvca-selected';
                        }
                        echo '<li><a class="' . esc_attr( $selected ) . '"
                                data-type="product_cat" data-value="' . esc_attr( $product_cat->slug ) . '"
                                href="' . esc_url( get_term_link( $product_cat->slug, 'product_cat' ) ) . '"
                                title="' . esc_attr( $product_cat->name ) . '">' . esc_html( $product_cat->name ) . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php /* Filter featured */ ?>
        <?php if ( $atts['show_featured_filter'] ) : ?>
            <?php
            $filter_arrs = array(
                esc_html__( 'All', 'zoo-kodo' )                 => 'all',
                esc_html__( 'Featured product', 'zoo-kodo')     => 'featured',
                esc_html__( 'Onsale product', 'zoo-kodo' )      => 'onsale',
                esc_html__( 'Best Selling', 'zoo-kodo' )        => 'best-selling',
                esc_html__( 'Latest product', 'zoo-kodo' )      => 'latest',
                esc_html__( 'Top rate product', 'zoo-kodo' )    => 'toprate ',
                esc_html__( 'Price: Low to High', 'zoo-kodo' )  => 'price',
                esc_html__( 'Price: High to Low', 'zoo-kodo' )  => 'price-desc',
            );
            ?>
            <div class="<?php echo esc_attr( $fitem_class.$col_class ); ?>">
                <h3 class="cvca-title-filter-item"><?php esc_html_e( 'Sort By', 'zoo-kodo' ); ?></h3>
                <ul class="cvca-ajax-load cvca-list-filter">
                    <?php
                    foreach ( $filter_arrs as $key => $value ) {
                        $selected = '';

                        if ( isset( $atts['show'] ) && $atts['show'] == $value ) {
                            $selected = 'active';
                        }

                        if ( $value != 'all' ) {
                            echo '<li><a class="' . esc_attr( $selected ) . '"
                                    data-type="show"
                                    data-value="' . esc_attr( $value ) . '"
                                    href="" title="' . esc_attr( $key ) . '">' . esc_html( $key ) . '</a></li>';
                        }

                    }
                    ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php /* Filter price */ ?>
        <?php if ( $atts['show_price_filter'] && intval( $atts['price_filter_level'] ) > 0 ) : ?>
            <div class="<?php echo esc_attr( $fitem_class.$col_class ) ?>">
                <h3 class="cvca-title-filter-item"><?php esc_html_e( 'Price', 'zoo-kodo' ); ?></h3>
                <ul class="cvca-ajax-load cvca-price-filter">
                    <li>
                        <a class="active" data-type="price_filter" data-value="0" href="" title="All"><?php echo esc_html__( 'All', 'zoo-kodo' ); ?></a>
                    </li>
                    <?php
                    $price_format = get_woocommerce_price_format();
                    $price_currency = get_woocommerce_currency();
                    $price_currency_symbol = get_woocommerce_currency_symbol();

                    for ( $i = 1; $i <= intval( $atts['price_filter_level'] ); $i++ ) {
                        $min = ($i - 1) * intval( $atts['price_filter_range'] );
                        $max = $i * intval( $atts['price_filter_range'] );

                        $min_price = sprintf( $price_format, wc_format_decimal( $min, 2 ), $price_currency_symbol );
                        $max_price = sprintf( $price_format, wc_format_decimal( $max, 2 ), $price_currency_symbol );

                        $price_text = $min_price . ' - ' . $max_price;
                        if ( $i == intval( $atts['price_filter_level'] ) ) {
                            $price_text = $min_price . '+';
                        }

                        $selected = '';
                        $removed = '';
                        if ( isset( $_POST['price_filter'] ) && $_POST['price_filter'] == $i ) {
                            $selected = 'active';
                            $removed = '<span data-type="cvca-remove-price" class="cvca-remove-attribute"><i class="fa fa-times"></i></span>';
                        }
                        echo '<li>' . $removed . '<a  class="' . esc_attr( $selected ) . '"
                                data-type="price_filter"
                                data-value="' . esc_attr( $i ) . '"
                                href="" title="' . esc_attr( $key ) . '">' . esc_html( $price_text ) . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php /* Filter product_attributes */ ?>
        <?php if ($atts['filter_attributes'] != '') : ?>
            <?php
            $product_attribute_taxonomies = explode( ',', $atts['filter_attributes'] );
            if ( count($product_attribute_taxonomies ) > 0 ) {

                foreach ( $product_attribute_taxonomies as $product_attribute_taxonomie_slug ) {
                    global $wpdb;
                    $attribute_taxonomies = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies where attribute_name='" . $product_attribute_taxonomie_slug . "'" );

                    if ( isset( $attribute_taxonomies[0] ) ) {
                        $product_attribute_taxonomie = $attribute_taxonomies[0];
                        //$product_terms = get_terms( 'pa_'.$product_attribute_taxonomie->attribute_name, 'hide_empty=0' );
                        $product_terms = get_terms( 'pa_' . $product_attribute_taxonomie->attribute_name );

                        if ( count( $product_terms ) > 0 ) {
                            ?>
                            <div class="<?php echo esc_attr( $fitem_class.$col_class ) ?>">
                                <h3><?php echo esc_html( $product_attribute_taxonomie->attribute_label ) ?></h3>
                                <ul class="cvca-ajax-load cvca-product-attribute-filter">
                                    <?php
                                    foreach ( $product_terms as $product_term ) {
                                        $selected = '';
                                        $removed = '';
                                        $span_color = '';

                                        if ( trim( $product_term->taxonomy ) == 'pa_color' ) {
                                            $span_color = '<span class="span-color color-' . trim( $product_term->slug ) .' cs-font clever-icon-circle" style="background-color:' . trim( $product_term->slug ) .'"></span>';
                                        }

                                        if ( isset( $atts['wc_attr']['tax_query'] ) && count( $atts['wc_attr']['tax_query'] ) > 0 ) {

                                            foreach ( $atts['wc_attr']['tax_query'] as $tax_query ) {
                                                if ( $tax_query['taxonomy'] == $product_term->taxonomy && $tax_query['terms'] == $product_term->slug ) {
                                                    $selected = 'cvca-selected';
                                                    $removed = '<span data-type="cvca-remove-attr" class="cvca-remove-attribute"><i class="cs-font clever-icon-close-1"></i></span>';
                                                }
                                            }

                                        }

                                        echo '<li class="' . trim( $product_term->taxonomy ) . '"><a class="cvca-product-attribute ' . esc_attr( $selected ) . '"
                                            data-type="product_attribute"
                                            data-attribute_value="' . esc_attr( $product_term->slug ) . '"
                                            data-value="' . esc_attr( $product_term->taxonomy ) . '"
                                            title="' . esc_attr( $product_term->name ) . '">' . $removed . $span_color . esc_html( $product_term->name ) . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                        }
                    }
                }
            }
            ?>
        <?php endif; ?>

        <?php /* Filter tags */ ?>
        <?php if ( $atts['filter_tags'] != '' ) : ?>
            <?php
            $product_tags = explode(',', $atts['filter_tags']);

            if ( $atts['filter_col'] == '5' ) {
                $col_class = 'col-xs-12 col-sm-4';
            }
            ?>
            <div class="<?php echo esc_attr( $fitem_class . $col_class ); ?>">
                <h3 class="cvca-title-filter-item"><?php esc_html_e( 'Tags', 'zoo-kodo' ); ?></h3>
                <ul class="cvca-ajax-load cvca-list-product-tag">
                    <?php
                    $space = ', ';
                    $i = 0;
                    foreach ( $product_tags as $product_tag_slug ) {
                        $i ++;
                        $selected = '';
                        $product_tag = get_term_by( 'slug', $product_tag_slug, 'product_tag' );

                        if ( isset( $atts['wc_attr']['product_tag'] ) && $atts['wc_attr']['product_tag'] == $product_tag->slug ) {
                            $selected = 'cvca-selected';
                        }

                        if( $i == count($product_tags) ) {
                            $space = '';
                        }

                        echo '<li><a class="' . esc_attr( $selected ) . '" data-type="product_tag" data-value="' . esc_attr( $product_tag->slug ) . '" title="' . esc_attr( $product_tag->name ) . '">' . esc_html( $product_tag->name) . '<span class="space">' . $space . '</span></a></li>';

                    }
                    ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <div class="cvca-ajax-load">
        <a class="cvca-reset-filter" data-type="cvca-reset-filter" href="<?php echo esc_url(cvca_current_url());?>"><i class="cs-font clever-icon-close"></i><span><?php echo esc_html__('Clear All Filter', 'zoo-kodo'); ?></span></a>
    </div>
    <?php
}
