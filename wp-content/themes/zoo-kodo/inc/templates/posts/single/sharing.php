<div class="share-links pull-right">
	<div class="share-text"><?php esc_html_e( "Share", 'zoo-kodo' ); ?></div>
	<ul class="social-icons">
		<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="post_share_facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><i class="cs-font clever-icon-facebook" aria-hidden="true"></i></a></li>
		<li class="twitter"><a href="https://twitter.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="product_share_twitter"><i class="cs-font clever-icon-twitter" aria-hidden="true"></i></a></li>
		<li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if( function_exists( 'the_post_thumbnail' ) ) echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>&description=<?php echo get_the_title(); ?>"><i class="cs-font clever-icon-pinterest" aria-hidden="true"></i></a></li>
        <li class="google-plus"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="cs-font clever-icon-googleplus" aria-hidden="true"></i></a></li>
	</ul>
</div>
