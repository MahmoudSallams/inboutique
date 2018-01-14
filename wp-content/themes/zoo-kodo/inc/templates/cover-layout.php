<?php

$zoo_page_cover = zoo_page_cover();
$style = '';
$zoo_page_cover['color'] != ''? $style .= 'background:'.$zoo_page_cover['color'].' no-repeat center center;': '';
$zoo_page_cover['image'] != ''? $style .= 'background:url('.$zoo_page_cover['image'].') no-repeat center center;': '';
$zoo_page_cover['height'] != ''? $style .= 'height :'.$zoo_page_cover['height'].'px;': '';
?>
<div class="page-cover" style="<?php echo esc_attr($style); ?>">
	<div class="page-cover-inner">
		<?php if($zoo_page_cover['title'] != ''): ?>
			<h1 class="page-title" <?php if($zoo_page_cover['title_color'] !=''){ echo 'style="color:'.esc_attr($zoo_page_cover['title_color']).'"';} ?>><?php echo esc_attr($zoo_page_cover['title']); ?></h1>
		<?php endif; ?>
		<?php if($zoo_page_cover['des'] != ''): ?>
			<p class="page-description" <?php if($zoo_page_cover['des_color'] !=''){ echo 'style="color:'.esc_attr($zoo_page_cover['des_color']).'"';} ?>><?php echo esc_attr($zoo_page_cover['des']); ?></p>
		<?php endif; ?>
	</div>
</div>

