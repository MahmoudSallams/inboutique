<?php 
the_post_navigation( array(
    'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next article', 'zoo-kodo' ) . '</span>' . '<span class="post-title">%title</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous article', 'zoo-kodo' ) . '</span> ' .
        '<span class="post-title">%title</span>',
) );
 ?>