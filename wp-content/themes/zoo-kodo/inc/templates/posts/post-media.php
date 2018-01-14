<?php
/**
 * Media block for post
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
?>
<?php if ( has_post_format( 'gallery' ) ) : ?>

    <?php $zoo_images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>

    <?php if ( $zoo_images ) : ?>
        <?php
        wp_enqueue_style( 'slick' );
        wp_enqueue_style( 'slick-theme' );
        wp_enqueue_script( 'slick' );
        ?>
        <div class="post-image<?php echo ( is_single() ) ? ' single-image' : ''; ?>">
            <ul class="post-slider">
                <?php foreach ( $zoo_images as $zoo_image ) : ?>
                    <?php
                    $zoo_the_image = wp_get_attachment_image_src( $zoo_image, 'full-thumb' );
                    $zoo_the_caption = get_post_field( 'post_excerpt', $zoo_image );
                    ?>
                    <li>
                        <img src="<?php echo esc_url( $zoo_the_image[0] ); ?>" <?php if ( $zoo_the_caption ) : ?>title="<?php echo esc_attr( $zoo_the_caption ); ?>"<?php endif; ?> />
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

<?php elseif ( has_post_format( 'video' ) ) : ?>

    <div class="post-image<?php echo ( is_single() ) ? ' single-video' : ''; ?>">
        <?php $zoo_video = get_post_meta( get_the_ID(), '_format_video_embed', true ); ?>

        <?php if ( wp_oembed_get( $zoo_video ) ) : ?>
            <?php echo wp_oembed_get( $zoo_video ); ?>
        <?php else : ?>
            <?php echo ent2ncr( $zoo_video ); ?>
        <?php endif; ?>
    </div>

<?php elseif ( has_post_format( 'audio' ) ) : ?>

    <div class="post-image audio<?php echo ( is_single() ) ? ' single-audio' : ''; ?>">
        <?php
        $zoo_audio = get_post_meta( get_the_ID(), '_format_audio_embed', true );

        if ( wp_oembed_get( $zoo_audio ) ) {
            echo wp_oembed_get( $zoo_audio );
        } else {
            echo ent2ncr( $zoo_audio );
        }
        ?>
    </div>

<?php else : ?>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-image<?php echo ( is_single() ) ? ' single-image' : ''; ?>">
            <?php if ( !is_single() ) : ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title() ?>">
            <?php endif; ?>
                <?php the_post_thumbnail( 'full-thumb' ); ?>
            <?php if ( !is_single() ) : ?>
            </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

<?php endif; ?>
