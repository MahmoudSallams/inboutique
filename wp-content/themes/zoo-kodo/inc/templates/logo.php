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
$zoo_hasLogo = false;
$zoo_hideTagline = false;
$display_header_text = display_header_text();

if ( ! $display_header_text ) {
    $zoo_hasLogo = false;
    $zoo_hideTagline = true;
}

if ( is_single() || is_page() ) {
    if ( get_post_meta( get_the_ID(), 'zoo_logo_page', true ) != '' && get_post_meta( get_the_ID(), 'zoo_logo_page', true ) != 0 ) {
        $zoo_hasLogo = true;
    }

    if ( get_post_meta( get_the_ID(), 'zoo_hide_tag_line', true ) == true ) {
        $zoo_hideTagline = true;
    }
}

$logo_sticky = zoo_kodo_option('zoo_site_logo_sticky');

if ( get_post_meta( get_the_ID(), 'zoo_sticky_logo_page', true ) != '' && get_post_meta( get_the_ID(), 'zoo_sticky_logo_page', true ) != 0 ) {
    $logo_sticky = get_post_meta( get_the_ID(), 'zoo_sticky_logo_page', true );
}
?>

<?php if ( $zoo_hasLogo ) : ?>
    <p id="logo" class="site-logo<?php echo empty($logo_sticky) ? ' is-sticky-logo' : ''; ?>">
        <a href="<?php echo esc_url( home_url('/') ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
            <img class="lg-img" src="<?php echo esc_url( wp_get_attachment_url( get_post_meta( get_the_ID(), 'zoo_logo_page', true ) ) ) ?>" alt="<?php bloginfo( 'name' ); ?>"/>
        </a>
    </p>
<?php else:
    if ( !get_theme_mod( 'custom_logo' ) ) : ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url('/') ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
        </h1>
    <?php else : ?>
        <p id="logo" class="site-logo<?php echo empty($logo_sticky) ? ' is-sticky-logo' : ''; ?>">
            <a href="<?php echo esc_url( home_url('/') ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                <?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', '', array( 'class' => 'lg-img' )); ?>
            </a>
        </p>
    <?php endif; ?>
<?php endif; ?>

<?php if ( ! $zoo_hideTagline ) : ?>
    <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); ?></p>
<?php endif; ?>
