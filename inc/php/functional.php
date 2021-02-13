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
 * Inject the preloader into the website's frontend (head section)
 */
add_action( 'wp_head', 'spacexchimp_p007_generator', 0 );
