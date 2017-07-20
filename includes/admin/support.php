<?php
/**
 * Admin Support Page
 *
 * @package     GamiPress\Admin\Support
 * @since       1.0.0
 */

/**
 * Help and Support page
 * @since  1.0.0
 * @return void
 */
function gamipress_help_support_page() { ?>
    <div class="wrap" >
        <div id="icon-options-general" class="icon32"></div>
        <h2><?php _e( 'GamiPress Help and Support', 'gamipress' ); ?></h2>

        <h2><?php _e( 'About GamiPress', 'gamipress' ); ?>:</h2>
        <p><?php echo __( 'GamiPress is plugin to WordPress that allows your site\'s users to complete tasks, demonstrate achievements, and earn points. You define the achievement types, organize your requirements any way you like, and choose from a range of options to determine whether each task or requirement has been achieved.', 'gamipress' ); ?></p>

        <?php do_action( 'gamipress_help_support_page_about' ); ?>

        <h2><?php _e( 'Help / Support', 'gamipress' ); ?>:</h2>
        <p><?php printf(
                __( 'For support on using GamiPress or to suggest feature enhancements, visit the official %1$s. %2$s with inquiries.', 'gamipress' ),
                sprintf(
                    '<a href="https://wordpress.org/support/plugin/gamipress" target="_blank">%s</a>',
                    __( 'GamiPress support forums', 'gamipress' )
                ),
                sprintf(
                    '<a href="https://gamipress.com/contact-us/" target="_blank">%s</a>',
                    __( 'Contact us', 'gamipress' )
                )
            ); ?></p>

        <?php do_action( 'gamipress_help_support_page_help' ); ?>

        <h2><?php _e( 'Shortcodes', 'gamipress' ); ?>:</h2>
        <p><?php _e( 'With GamiPress activated, the following shortcodes can be placed on any page or post within WordPress to expose a variety of GamiPress functions.', 'gamipress' ); ?></p>

        <?php do_action( 'gamipress_help_support_page_shortcodes' ); ?>
    </div>
    <?php
}