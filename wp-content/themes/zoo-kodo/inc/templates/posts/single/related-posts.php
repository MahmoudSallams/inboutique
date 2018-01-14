<?php
/**
 * Block Related for post
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
if( zoo_kodo_option( 'zoo_blog_single_related' ) ) {
    $zoo_categories = get_the_category( get_the_ID() );
    $zoo_category_ids = array();

    foreach ( $zoo_categories as $zoo_category ) $zoo_category_ids[] = $zoo_category->term_id;

    $args = array(
        'post_type'     => 'post',
        'post__not_in'  => array( get_the_ID() ),
        'showposts'     => zoo_kodo_option( 'zoo_blog_single_related_number_items' ),
        'ignore_sticky_posts' => -1
    );

    $zoo_related_query = new wp_query( $args );

    if ( $zoo_related_query->have_posts() ) {
        $class = 'item-related ';
        switch ( zoo_kodo_option( 'zoo_blog_single_related_number_items' ) ) {
            case '2':
                $class .= "col-xs-12 col-sm-6";
                break;
            case '3':
                $class .= "col-xs-12 col-sm-4";
                break;
            case '4':
                $class .= "col-xs-12 col-sm-3";
                break;
            case '5':
                $class .= "col-xs-12 col-sm-1-5";
                break;
            case '6':
                $class .= "col-xs-12 col-sm-2";
                break;
            default:
                $class .= "col-xs-12 col-sm-12";
                break;
        }
        ?>
        <div class="post-related clearfix">
            <h4 class="title-block"><?php esc_html_e( 'You may be also like', 'zoo-kodo' ); ?></h4>
            <div class="row">
                <?php while ( $zoo_related_query->have_posts() ) {
                    $zoo_related_query->the_post(); ?>
                    <article <?php echo post_class( $class ) ?>>
                        <div class="post-media">
                            <?php if ( (function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) : ?>
                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="wrap-post-thumbnail" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_post_thumbnail( 'medium' ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <h3 class="title-post"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
                        <div class="post-info date-post"><?php echo esc_html( get_the_date() ); ?></div>
                    </article>
                    <?php
                } ?>
            </div>
        </div>
    <?php }
    wp_reset_postdata();
}
?>
