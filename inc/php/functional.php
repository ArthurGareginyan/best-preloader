<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Generate the CSS of preloader from options and add it to head section of website
 *
 * @since 4.0
 */
function bestpreloader_css_options() {

    // Read options from BD and declare variables
    $options = get_option( 'bestpreloader_settings' );

    if (!empty($options['background-color'])) {
        $backgroun_color = $options['background-color'];
    } else {
        $backgroun_color = "#ffffff";
    }

    if (!empty($options['preloader-size'])) {
        $preloader_size = $options['preloader-size'];
    } else {
        $preloader_size = "100";
    }

    if (!empty($options['custom-image'])) {
        $image = $options['custom-image'];
    } else {
        $image = BESTPL_URL . 'inc/img/preloader.gif';
    }

    ?>
        <style type="text/css">
            #preloader {
                display: none;
            }
            #preloader-background {
                background-color: <?php echo $backgroun_color; ?>;
            }
            #preloader-status {
                background-image:url(<?php echo $image; ?>);
                -moz-background-size: <?php echo $preloader_size; ?>px <?php echo $preloader_size; ?>px;
                -o-background-size: <?php echo $preloader_size; ?>px <?php echo $preloader_size; ?>px;
                -webkit-background-size: <?php echo $preloader_size; ?>px <?php echo $preloader_size; ?>px;
            }
        </style>

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
add_action( 'wp_head' , 'bestpreloader_css_options' );

/**
 * Add DIV container with preloader to footer.
 *
 * @since 1.0
 */
function bestpreloader_add_container() {
    ?>
        <div id="preloader">
            <div id="preloader-background"></div>
            <div id="preloader-status"></div>
        </div>
    <?php
}
add_action( 'wp_head', 'bestpreloader_add_container', 1000 );
