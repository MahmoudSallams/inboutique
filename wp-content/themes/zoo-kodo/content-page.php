<?php
/**
 * The template used for displaying page content
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

if ( get_post_meta( get_the_ID(), 'zoo_disable_title', true ) != 1 ) {
    the_title( '<h1 class="entry-title">', '</h1>' );
}

the_content();

get_template_part( 'inc/templates/inpost_pagination' );

edit_post_link( esc_html__( 'Edit', 'zoo-kodo' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
