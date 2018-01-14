<div class="post-social clearfix">
    <?php
    get_template_part( 'inc/templates/posts/single/tag' );

    if ( get_theme_mod( 'zoo_blog_single_share', '1' ) == 1 ) {
        get_template_part( 'inc/templates/posts/single/sharing' );
    } ?>
</div>