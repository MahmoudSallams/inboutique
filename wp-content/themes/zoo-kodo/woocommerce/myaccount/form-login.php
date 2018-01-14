<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action('woocommerce_before_customer_login_form'); ?>

<div class="wrap-login" id="customer_login">

    <div class="login form">
        <h3><?php esc_html_e('Sign In', 'zoo-kodo'); ?></h3>
        <?php
        if ( is_plugin_active( 'super-socializer/super_socializer.php' ) ) {            
            echo do_shortcode('[TheChamp-Login title="Login with your Social Account"]');
        }
        ?>
        <form method="post" class="login">

            <?php do_action('woocommerce_login_form_start'); ?>

            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                <label for="username"><?php esc_attr_e('Username or Email', 'woocommerce'); ?> *</label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if (!empty($_POST['username'])) echo esc_attr($_POST['username']); ?>"/>
            </p>
            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                <label for="password"><?php esc_attr_e('Password', 'woocommerce'); ?> *</label>
                <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password"
                       id="password"/>
            </p>

            <?php do_action('woocommerce_login_form'); ?>
            <p  class="form-row"><label for="rememberme" class="inline">
                    <input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox"
                           id="rememberme" value="forever"/> <?php esc_html_e('Remember me', 'woocommerce'); ?>
                </label>
                <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
            </p>
            <p class="form-row">
                <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                <input type="submit" class="woocommerce-Button button" name="login"
                       value="<?php esc_attr_e('Login', 'woocommerce'); ?>"/>
            </p>

            <?php do_action('woocommerce_login_form_end'); ?>
            <?php if (get_option('woocommerce_enable_myaccount_registration') === 'yes'){ ?>
                <p class="space"><span><?php esc_html_e( 'or', 'zoo-kodo' ); ?></span></p>
                <a href="#" class="btn btn-show-register light" title="<?php esc_attr_e('Create New Account', 'zoo-kodo'); ?>"><?php esc_html_e('Create New Account', 'zoo-kodo'); ?></a>
                <?php
            } ?>
        </form>

    </div>
    <?php if ( get_option('woocommerce_enable_myaccount_registration') === 'yes' ) : ?>
    <div class="register form" style="display:none">

        <h3><?php esc_html_e('Register', 'woocommerce'); ?></h3>

        <form method="post" class="register">

            <?php do_action('woocommerce_register_form_start'); ?>

            <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

                <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username"
                           id="reg_username" placeholder="<?php esc_attr_e('Username', 'woocommerce'); ?> *"
                           value="<?php if (!empty($_POST['username'])) echo esc_attr($_POST['username']); ?>"/>
                </p>

            <?php endif; ?>

            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email"
                       id="reg_email" placeholder="<?php esc_attr_e('Email address', 'woocommerce'); ?> *" value="<?php if (!empty($_POST['email'])) echo esc_attr($_POST['email']); ?>"/>
            </p>

            <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password"
                        placeholder="<?php esc_attr_e('Password', 'woocommerce'); ?> *"   id="reg_password"/>
                </p>

            <?php endif; ?>

            <!-- Spam Trap -->
            <div style="<?php echo((is_rtl()) ? 'right' : 'left'); ?>: -999em; position: absolute;">
                <label for="trap"><?php esc_html_e('Anti-spam', 'woocommerce'); ?></label>
                <input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off"/>
            </div>

            <?php do_action('woocommerce_register_form'); ?>
            <?php do_action('register_form'); ?>

            <p class="woocomerce-FormRow form-row">
                <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                <input type="submit" class="woocommerce-Button button" name="register"
                       value="<?php esc_attr_e('Register', 'woocommerce'); ?>"/>
            </p>

            <?php do_action('woocommerce_register_form_end'); ?>
            <p class="space"><span><?php esc_html_e( 'or', 'zoo-kodo' ); ?></span></p>
            <a href="#" class="btn btn-show-login light" title="<?php esc_attr_e('Sign In', 'woocommerce'); ?>"><?php esc_html_e('Sign In', 'woocommerce'); ?></a>
        </form>

    </div>

</div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>
