<?php
/**
 * Contextual Help
 *
 * @package     GamiPress\Admin\Contextual_Help
 * @since       1.1.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Adds the contextual help for GamiPress pages
 *
 * @since 1.1.0
 * @return void
 */
function gamipress_edit_screen_contextual_help() {
    $screen = get_current_screen();

    $gamipress_edit_screens = array( 'points-type', 'achievement-type' );

    if ( ! ( in_array( $screen->id, $gamipress_edit_screens )
        || in_array( $screen->id, gamipress_get_achievement_types_slugs() ) ) )
        return;

    $screen->set_help_sidebar(
        '<p><strong>' . sprintf( __( 'For more information:', 'gamipress' ) . '</strong></p>' .
        '<p>' . sprintf( __( 'Visit the <a href="%s">documentation</a> on the GamiPress website.', 'gamipress' ), esc_url( 'https://gamipress.com/docs' ) ) ) . '</p>'
    );

    // Points/Achievement types edit screens
    if( in_array( $screen->id, $gamipress_edit_screens ) ) {

        $label = $screen->id === 'points-type' ? __( 'Points Type', 'gamipress' ) : __( 'Achievement Type', 'gamipress' );

        $screen->add_help_tab( array(
            'id'	    => 'gamipress-' . $screen->id . '-data',
            'title'	    => sprintf( __( '%s Data', 'gamipress' ), $label ),
            'content'	=>
                '<p>' . sprintf( __( '<strong>Singular Name</strong> - The singular name for this %s.', 'gamipress' ), strtolower( $label ) ) . '</p>' .
                '<p>' . sprintf( __( '<strong>Plural Name</strong> - The plural name for this %s.', 'gamipress' ), strtolower( $label ) ) . '</p>' .
                '<p>' . sprintf( __( '<strong>Slug</strong> - Slug is used for internal references, as some shortcode attributes, to completely differentiate this %s from any other (leave blank to automatically generate one).', 'gamipress' ), strtolower( $label ) )  . '</p>' .
                (( $screen->id === 'achievement-type' ) ? '<p>' . __( 'After adding a new achievement type a new menu will appear in your admin area named <strong>Achievements</strong>. Inside the achievements menu will appear new sub menus with each achievement type registered to let you manage the achievements similar to WordPress default posts or pages.', 'gamipress' ) . '</p>' : '' )
        ) );

        if( $screen->id === 'points-type' ) {

            $screen->add_help_tab( array(
                'id'	    => 'gamipress-points-awards',
                'title'	    => __( 'Points Awards', 'gamipress' ),
                'content'	=>
                    '<p>' . __( 'Points awards are automatic ways an user could retrieve an amount of a points type.', 'gamipress' ) . '</p>' .
                    '<p>' . sprintf( __( 'For more information, see <a href="%s">Points Awards and Steps</a> documentation page on the GamiPress website.', 'gamipress' ), esc_url( 'https://gamipress.com/docs/getting-started/points-awards-and-steps/' ) ) . '</p>'
            ) );

        }

    }

    // Achievement edit screen
    if( in_array( $screen->id, gamipress_get_achievement_types_slugs() ) ) {

        $screen->add_help_tab( array(
            'id'	    => 'gamipress-achievement-data',
            'title'	    => __( 'Achievement Data', 'gamipress' ),
            'content'	=>
                '<p>' . __( '<strong>Points Awarded</strong> - The amount of points to award to the user for earn the achievement (Optional).', 'gamipress' ) . '</p>' .
                '<p>' . __( '<strong>Points Type</strong> - The points type of the amount of points to award (Optional).', 'gamipress' ) . '</p>' .
                '<p>' . __( '<strong>Earned by</strong> - To define how this achievement can be earned. Choosing “Completing steps” will add a new box to configure the steps required.', 'gamipress' ) . '</p>' .
                '<p>' . __( '<strong>Sequential Steps</strong> <small>(Only if achievement is set up to earned by completing steps)</small> - Checking this option will force users to complete the steps in order.', 'gamipress' ) . '</p>' .
                '<p>' . __( '<strong>Minimum Points Required</strong> <small>(Only if achievement is set up to earned by a minimum number of points)</small> - The fewest amount of points required to earn the achievement.', 'gamipress' ) . '</p>' .
                '<p>' . __( '<strong>Points Type Required</strong> <small>(Only if achievement is set up to earned by a minimum number of points)</small> - The points type of the amount of points required to earn the achievement (Optional).', 'gamipress' ) . '</p>' .
                '<p>' . __( '<strong>Show Earners</strong> - Checking this option will add a list of users who have earned this achievement on the achievement single view.', 'gamipress' ) . '</p>' .
                '<p>' . __( '<strong>Congratulations Text</strong> - The text displayed after achievement is earned.', 'gamipress' ) . '</p>' .
                '<p>' . __( '<strong>Maximum Earnings</strong> - Maximum number of times a user can earn the achievement. You can leave it empty for no maximum.', 'gamipress' ) . '</p>' .
                '<p>' . __( '<strong>Hidden</strong> - Checking this option will hide the achievement on frontend.', 'gamipress' ) . '</p>'
        ) );


        $screen->add_help_tab( array(
            'id'	    => 'gamipress-steps',
            'title'	    => __( 'Steps', 'gamipress' ),
            'content'	=>
                '<p>' . __( 'Steps are the conditionals of an achievement to be considered complete. They are present just on achievements that are configured to be earned by completing steps.', 'gamipress' ) . '</p>' .
                '<p>' . sprintf( __( 'For more information, see <a href="%s">Points Awards and Steps</a> documentation page on the GamiPress website.', 'gamipress' ), esc_url( 'https://gamipress.com/docs/getting-started/points-awards-and-steps/' ) ) . '</p>'
        ) );
    }
}
add_action( 'load-post.php', 'gamipress_edit_screen_contextual_help' );
add_action( 'load-post-new.php', 'gamipress_edit_screen_contextual_help' );