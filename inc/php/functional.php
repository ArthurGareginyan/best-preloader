<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Generate the preloader
 * @return string
 */
function spacexchimp_p007_generator() {

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

/**
 * Callback for checking if the current page matches the selected one
 * @return boolean ('true' or 'false')
 */
function spacexchimp_p007_load_on() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p007_options();

    // Declare variables
    $load_on = $options['display-preloader'];

    // Return 'true' if the current page matches the selected one
    if ( $load_on == '' ) {
        return true;
    } elseif ( $load_on == 'Home Page Only' ) {
        if ( is_home() OR is_front_page() ) {
            return true;
        }
    }

    // Return 'false' if nothing matches
    return false;
}

/**
 * Autoload option
 */
function spacexchimp_p007_autoload() {

    // Check if the current page matches the selected one
    $load_on = spacexchimp_p007_load_on();
    if ( $load_on === true ) {
        spacexchimp_p007_generator();
    }
}

/**
 * Inject the preloader into the website's frontend (head section)
 */
add_action( 'wp_head', 'spacexchimp_p007_autoload', 0 );
