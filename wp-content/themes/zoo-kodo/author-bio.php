<?php
/**
 * Author info
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
?>

<div class="author-info">
    <h2 class="author-heading"><?php esc_html_e( 'Published by', 'zoo-kodo' ); ?></h2>
    <div class="author-avatar">
        <?php
        /**
         * Filter the author bio avatar size.
         *
         * @param int $size The avatar height and width size in pixels.
         */
        $author_bio_avatar_size = apply_filters( 'zoo_kodo_author_bio_avatar_size', 56 );

        echo ent2ncr(get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size ));
        ?>
    </div> <!-- .author-avatar -->

    <div class="author-description">
        <h3 class="author-title"><?php echo ent2ncr(get_the_author()); ?></h3>

        <p class="author-bio">
            <?php the_author_meta( 'description' ); ?>
            <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                <?php printf( esc_html__( 'View all posts by %s', 'zoo-kodo' ), get_the_author() ); ?>
            </a>
        </p> <!-- .author-bio -->

    </div> <!-- .author-description -->
</div> <!-- .author-info -->
