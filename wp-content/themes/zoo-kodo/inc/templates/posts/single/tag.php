<?php
/**
 * Block information for post
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
if( zoo_kodo_option( 'zoo_blog_single_tags' ) && has_tag() ) {
?>
<div class="tags-link-wrap">
	<div class="tags clearfix pull-left">
	    <h5><?php echo esc_html__( 'Tags:', 'zoo-kodo' ); ?></h5>

	    <?php the_tags( '', ', ', '' ); ?>
    </div>
</div>
<?php } ?>
