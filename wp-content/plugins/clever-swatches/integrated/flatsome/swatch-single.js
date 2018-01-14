<script>
jQuery(document).bind('cleverswatch_update_gallery', function (event, response) {
    if(!jQuery('.cw-wrap-images')[0]){
        jQuery('.woocommerce-product-gallery').parent().addClass('cw-wrap-images')
    }
	jQuery('#product-' + response.product_id).find('.cw-wrap-images').html(response.content);
    setTimeout(function() {
        jQuery('#product-' + response.product_id).find('.slider').each(function () {
            jQuery(this).flickity(jQuery(this).data('flickity-options'));
            jQuery(".has-image-zoom .slide").easyZoom({loadingNotice:"",preventClicks:!1});
            if(!jQuery('.product-quick-view-container')[0]) {
                jQuery(this).wc_product_gallery();
            }
        });
    },300);
});
</script>