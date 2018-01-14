<?php
/** Logo
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

$logo_sticky = zoo_kodo_option('zoo_site_logo_sticky');
$zoo_logo_sticky_height = zoo_kodo_option( 'zoo_logo_sticky_height' );
?>
<?php if ( get_post_meta( get_the_ID(), 'zoo_sticky_logo_page', true ) != '' && get_post_meta( get_the_ID(), 'zoo_sticky_logo_page', true ) != 0 ) : ?>
    <p class="logo logo-sticky">
        <a href="<?php echo esc_url( home_url('/') ); ?>" <?php if( $zoo_logo_sticky_height != '' ){?>style="height:<?php echo esc_attr($zoo_logo_sticky_height);?>px"<?php }?> rel="home" title="<?php bloginfo( 'name' ); ?>">
            <img src="<?php echo esc_url( wp_get_attachment_url( get_post_meta( get_the_ID(), 'zoo_sticky_logo_page', true ) ) ) ?>" <?php if( $zoo_logo_sticky_height != '' ){?>style="height:<?php echo esc_attr($zoo_logo_sticky_height);?>px"<?php }?> alt="<?php bloginfo( 'name' ); ?>"/>
        </a>
    </p>
<?php else : ?>
    <?php if ( $logo_sticky != '' ) : ?>
        <p class="logo logo-sticky">
            <a href="<?php echo esc_url( home_url('/') ); ?>" <?php if( $zoo_logo_sticky_height != '' ){?>style="height:<?php echo esc_attr($zoo_logo_sticky_height);?>px"<?php }?> rel="home" title="<?php bloginfo( 'name' ); ?>">
                <img src="<?php echo esc_url( $logo_sticky ); ?>" <?php if( $zoo_logo_sticky_height != '' ){?>style="height:<?php echo esc_attr($zoo_logo_sticky_height);?>px"<?php }?> alt="<?php bloginfo( 'name' ); ?>"/>
            </a>
        </p>
    <?php endif; ?>
<?php endif; ?>
