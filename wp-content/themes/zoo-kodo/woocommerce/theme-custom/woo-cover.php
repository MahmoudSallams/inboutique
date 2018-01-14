<?php
/**
 * Template display cover image of WooCommerce Page
 */
if ( zoo_kodo_option( 'zoo_shop_cover' ) != 'disable' ) : ?>
    <?php if ( is_product_category() ) {
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $text = $image = '';
        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
    } ?>
    <?php
    $zoo_shop_cover_style = '';
    if ( zoo_kodo_option( 'zoo_shop_cover_height' ) != '' ) {
        $zoo_shop_cover_style .= 'min-height:' . zoo_kodo_option( 'zoo_shop_cover_height' ) . 'px;';
    }

    if ( zoo_kodo_option( 'zoo_shop_cover_background_color' ) != '' ) {
        $zoo_shop_cover_style .= ' background-color:' . zoo_kodo_option( 'zoo_shop_cover_background_color' ) . ';';
    }
    ?>
    <div id="woo-cover-page" style="<?php echo esc_attr( $zoo_shop_cover_style ); ?>">
        <?php
        if ( zoo_kodo_option( 'zoo_shop_cover' ) == 'slider-shortcode' && zoo_kodo_option( 'zoo_shop_slider_cover' ) != '' ) { ?>
            <div class="cover-media slider-shortcode">
                <?php echo do_shortcode( zoo_kodo_option( 'zoo_shop_slider_cover' ) ); ?>
            </div>
        <?php
        } elseif ( zoo_kodo_option( 'zoo_shop_cover' ) == 'custom-image' && zoo_kodo_option( 'zoo_shop_custom_image_cover' ) != '' ) { ?>
            <div class="cover-media custom-image">
                <?php $zoo_shop_custom_image_cover = zoo_kodo_option( 'zoo_shop_custom_image_cover' );?>
                <img src="<?php echo esc_url( $zoo_shop_custom_image_cover ) ?>" alt=""/>
            </div>
        <?php
        } elseif ( zoo_kodo_option( 'zoo_shop_cover' ) == 'category-image' && ! is_shop() ) {
            if ( is_product_category() ) {
                if ( $image !='' ) { ?>
                    <div class="cover-media category-image">
                        <?php echo '<img src="'.esc_url($image).'" alt="'.esc_attr($cat->name).'"/>'; ?>
                    </div>
                    <?php
                }
            }
        } ?>

        <div class="cover-content">
            <?php
            if ( zoo_kodo_option( 'zoo_shop_cover' ) == 'custom-image' || zoo_kodo_option( 'zoo_shop_cover' ) == 'category-image' ) {
                if ( zoo_kodo_option( 'zoo_shop_custom_content_cover' ) == '0' ) {
                    if ( is_shop() && ! is_product_category() ) { ?>
                        <h3 class="cover-title">
                            <?php echo esc_html( woocommerce_page_title() ); ?>
                        </h3>
                    <?php
                    }
                    if ( is_product_category() ) {
                    ?>
                        <?php if ( $cat->name != '' ): ?>
                            <h3 class="cover-title">
                                <?php echo esc_html( $cat->name ); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ( $cat->description != '' ): ?>
                            <div class="cover-description">
                                <?php echo esc_html( $cat->description ); ?>
                            </div>
                        <?php endif; ?>
                    <?php
                    }
                } else {
                    ?>
                    <?php if ( zoo_kodo_option( 'zoo_shop_custom_title_cover' ) != '' ): ?>
                        <h3 class="cover-title">
                            <?php echo esc_html( zoo_kodo_option( 'zoo_shop_custom_title_cover' ) ); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ( zoo_kodo_option( 'zoo_shop_custom_description_cover' ) != '' ): ?>
                        <div class="cover-description">
                            <?php echo esc_html( zoo_kodo_option( 'zoo_shop_custom_description_cover' ) ); ?>
                        </div>
                    <?php endif; ?>
                    <?php
                }

                do_action('zoo_woocommerce_breadcrumb');
            }
            ?>
        </div>
    </div>
<?php endif; ?>
