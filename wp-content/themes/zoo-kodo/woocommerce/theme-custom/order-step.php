<?php
/**
 * Template Order step
 * @since: zoo-theme 1.0
 */
?>
<div id="order-step">
    <?php if (is_cart()){?>
    <?php esc_html_e('Shopping Cart', 'zoo-kodo') ?>
    <?php }if (is_checkout()){ ?>
    <?php esc_html_e('Check Out Detail', 'zoo-kodo') ?>
    <?php }if (is_wc_endpoint_url('order-received')) {?>
    <?php esc_html_e('Order Complete', 'zoo-kodo'); }?>
</div>
