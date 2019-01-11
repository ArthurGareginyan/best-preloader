<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Add DIV container with preloader to footer.
 */
function spacexchimp_p007_add_container() {

    // Retrieve options from database
    $options = get_option( SPACEXCHIMP_P007_SETTINGS . '_settings' );

    // Return if the button is disabled
    if ( empty( $options['enable_preloader'] ) ) {
        return;
    }

    ?>
        <div id="preloader">
            <div id="preloader-background"></div>
            <div id="preloader-status"></div>
        </div>
        <noscript>
            <style type="text/css">
                #preloader,
                #preloader-background,
                #preloader-status {
                    display: none !important;
                }
            </style>
        </noscript>
    <?php
}
add_action( 'wp_head', 'spacexchimp_p007_add_container', 0 );
