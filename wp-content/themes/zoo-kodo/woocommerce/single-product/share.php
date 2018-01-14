<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if ( zoo_kodo_option( 'zoo_single_share' ) ) : ?>
<div class="woo-custom-share">
	<div class="woo-share-mask"></div>
	<div class="woo-share-close"><i class="cs-font clever-icon-close"></i></div>
	<span class="woo-share-label"><i class="cs-font clever-icon-share-2"></i><?php echo esc_html__('Share', 'zoo-kodo');?></span>
	<div class="woo-share-icons">
		<div class="woo-share-inner">
			<div class="share-title"><h4>Share</h4><h1><?php the_title(); ?></h1></div>
			<ul class="social-icons">
				<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="post_share_facebook icon-around" onclick="javascript:window.open(this.href,
		                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;" title="<?php echo esc_html__('Share to facebook','zoo-kodo')?>"><i class="cs-font clever-icon-facebook"></i> </a></li>
				<li class="twitter"><a href="https://twitter.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
		                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" title="<?php  echo esc_html__('Share to twitter','zoo-kodo')?>" class="product_share_twitter icon-around"><i class="cs-font clever-icon-twitter"></i></a></li>
				<li class="google-plus"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
		                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php  echo esc_html__('Share to google plus','zoo-kodo')?>" class="icon-around"><i class="cs-font clever-icon-googleplus"></i></a></li>
				<li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" class="product_share_email icon-around" title="<?php  echo esc_html__('Share to pinterest','zoo-kodo')?>"><i class="cs-font clever-icon-pinterest"></i></a></li>
				<li class="mail"><a href="mailto:?subject=<?php the_title(); ?>&body=<?php echo strip_tags(get_the_excerpt()); ?> <?php the_permalink(); ?>" class="product_share_email icon-around" title="<?php  echo esc_html__('Sent to mail','zoo-kodo')?>"><i class="cs-font clever-icon-email-envelope"></i></a></li>
			</ul>
	</div>
	</div>
</div>
<?php endif; ?>
