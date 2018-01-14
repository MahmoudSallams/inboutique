<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_template_part('woocommerce/theme-custom/order','step');

?>

<?php if ( $order ) : ?>
    <div class="wrap-header-order">
        <?php if ( $order->has_status( 'failed' ) ) : ?>
            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ) ?></a>
                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
                <?php endif; ?>
            </p>

        <?php else : ?>

            <h6 class="woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), $order); ?></h6>

            <ul class="woocommerce-thankyou-order-details order_details">
                <li class="order">
                    <span><?php esc_html_e('Order Number', 'woocommerce'); ?></span>
                    <strong><?php echo wp_kses_post( $order->get_order_number() ); ?></strong>
                </li>
                <li class="date">
                    <span><?php esc_html_e('Date', 'woocommerce'); ?></span>
                    <strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
                </li>
                <li class="total">
                    <span><?php esc_html_e('Total', 'woocommerce'); ?></span>
                    <strong><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></strong>
                </li>
                <?php if ( $order->get_payment_method_title() ) : ?>
                    <li class="method">
                        <span><?php esc_html_e('Payment Method', 'woocommerce'); ?></span>
                        <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="clear"></div>

        <?php endif; ?>
    </div>
    <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
    <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

<?php else : ?>
    <h6 class="woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); ?></h6>
<?php endif; ?>
