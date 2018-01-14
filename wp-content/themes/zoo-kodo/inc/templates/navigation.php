<?php
$navigation = get_post_meta( get_the_ID(), 'zoo_header_custom_menu', true );

if ( !empty( $navigation ) && $navigation != 'none' ) {
    wp_nav_menu(
        array(
            'menu'            => $navigation,
            'container'       => 'nav',
            'container_class' => 'main-menu'
        )
    );
} else {
    if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array( 'container_class' => 'main-menu', 'theme_location' => 'primary', 'container'=>'nav' ) );
    } else {
        wp_nav_menu( array( 'container_class' => 'main-menu', 'container'=>'nav' ) );
    }
}