<ul class="top-menu-block list-link horizontal" id="top-menu-block">
    <li>
        <span><?php esc_html_e('Become An Instructor', 'zoo-kodo'); ?></span>
    </li>

    <?php if ( !is_user_logged_in() ) : ?>
        <li>
            <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
                <i class="cs-font clever-icon-user-2" aria-hidden="true"></i>
                <span><?php esc_html_e( 'Sign Up', 'zoo-kodo' ); ?></span>
            </a>
        </li>
    <?php endif; ?>


    <?php if ( !is_user_logged_in() ) : ?>
        <li>
            <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
                <i class="cs-font clever-icon-lock" aria-hidden="true"></i>
                <span><?php esc_html_e( 'Login', 'zoo-kodo' ); ?></span>
            </a>
        </li>
    <?php else : ?>
        <li>
            <a href="<?php echo wp_logout_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
                <i class="cs-font clever-icon-lock" aria-hidden="true"></i>
                <span><?php esc_html_e('Logout', 'zoo-kodo'); ?></span>
            </a>
        </li>
    <?php endif; ?>
</ul>
