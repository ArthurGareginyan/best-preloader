<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Generate the preloader
 */
function spacexchimp_p007_generator() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Retrieve options from database
    $options = get_option( $plugin['settings'] . '_settings' );

    // Generate preloader
    ?>
        <div id="preloader">
            <div id="preloader-background"></div>
            <div id="preloader-status"></div>
        </div>
    <?php

    // Generate script
    ?>
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
add_action( 'wp_head', 'spacexchimp_p007_generator', 0 );
