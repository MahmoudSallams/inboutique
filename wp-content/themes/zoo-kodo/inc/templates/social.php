<?php
/**
 * Socail template
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
?>

<div class="zoo-social">
    <ul class="social-share">
    <?php
    if ( zoo_kodo_option( 'zoo_social_facebook' ) != '' ) {
        echo '<li class="facebook"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_facebook' ) ) . '" class="socail-item" title="Facebook"><i class="cs-font clever-icon-facebook"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_twitter' ) != '' ) {
        echo '<li class="twitter"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_twitter' ) ) . '" class="socail-item" title="Twitter"><i class="cs-font clever-icon-twitter"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_pinterest' ) != '' ) {
        echo '<li class="pinterest"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_pinterest' ) ) . '" class="socail-item" title="Pinterest"><i class="cs-font clever-icon-pinterest"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_dribbble' ) != '' ) {
        echo '<li class="dribbble"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_dribbble' ) ) . '" class="socail-item" title="Dribble"><i class="cs-font clever-icon-dribbble"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_vimeo' ) != '' ) {
        echo '<li class="vimeo"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_vimeo' ) ) . '" class="socail-item" title="Vimeo"><i class="cs-font clever-icon-vimeo"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_tumblr' ) != '' ) {
        echo '<li class="tumblr"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_tumblr' ) ) . '" class="socail-item" title="Tumblr"><i class="cs-font clever-icon-tumblr"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_skype' ) != '' ) {
        echo '<li class="skype"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_skype' ) ) . '" class="socail-item" title="Skype"><i class="cs-font clever-icon-skype"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_linkedin' ) != '' ) {
        echo '<li class="linkedin"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_linkedin' ) ) . '" class="socail-item" title="Linkin"><i class="cs-font clever-icon-linkedin"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_googleplus' ) != '' ) {
        echo '<li class="googleplus"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_googleplus' ) ) . '" class="socail-item" title="Google plus"><i class="cs-font clever-icon-googleplus"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_instagram' ) != '' ) {
        echo '<li class="instagram"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_instagram' ) ) . '" class="socail-item" title="Instagram"><i class="cs-font clever-icon-instagram"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_flickr' ) != '' ) {
        echo '<li class="flickr"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_flickr' ) ) . '" class="socail-item" title="Flick"><i class="cs-font clever-icon-flickr"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_youtube' ) != '' ) {
        echo '<li class="youtube"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_youtube' ) ) . '" class="socail-item" title="YouTube"><i class="cs-font clever-icon-youtube"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_foursquare' ) != '' ) {
        echo '<li class="foursquare"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_foursquare' ) ) . '" class="socail-item" title="Foursquare"><i class="cs-font clever-icon-foursquare"></i> </a></li>';
    }

    if ( zoo_kodo_option('zoo_social_github' ) != '' ) {
        echo '<li class="github"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_github' ) ) . '" class="socail-item" title="Github"><i class="cs-font clever-icon-github"></i> </a></li>';
    }

    if ( zoo_kodo_option( 'zoo_social_xing' ) != '' ) {
        echo '<li class="xing"><a href="' . esc_url( zoo_kodo_option( 'zoo_social_xing' ) ) . '" class="socail-item" title="Xing"><i class="cs-font clever-icon-xing"></i> </a></li>';
    }
    ?>
    </ul>
</div>
