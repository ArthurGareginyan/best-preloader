<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Callback for the dynamic JavaScript
 */
function spacexchimp_p007_load_scripts_dynamic_js() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p007_options();

    // Create an array (JS object) with all the settings
    $script_params = array(
                           'plugin_url' => $plugin['url'],
                           'seconds' => $options['seconds']
                           );

    // Inject the array into the JavaScript file
    wp_localize_script( $plugin['prefix'] . '-admin-js', $plugin['prefix'] . '_scriptParams', $script_params );
    wp_localize_script( $plugin['prefix'] . '-frontend-js', $plugin['prefix'] . '_scriptParams', $script_params );
}

/**
 * Callback for the dynamic CSS
 */
function spacexchimp_p007_load_scripts_dynamic_css() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p007_options();

    // Create an array with all the settings (CSS code)
    $custom_css = "
                    #preloader {
                        display: none;
                    }
                    #preloader-background {
                        background-color: " . $options['background-color'] . ";
                    }
                    #preloader-status {
                        background-image:url(" . $options['custom-image'] . ");
                        -moz-background-size: " . $options['preloader-size'] . "px " . $options['preloader-size'] . "px;
                        -o-background-size: " . $options['preloader-size'] . "px " . $options['preloader-size'] . "px;
                        -webkit-background-size: " . $options['preloader-size'] . "px " . $options['preloader-size'] . "px;
                    }
                  ";

    // Inject the array into the stylesheet
    wp_add_inline_style( $plugin['prefix'] . '-frontend-css', $custom_css );
}

/**
 * Load scripts and style sheet for settings page
 */
function spacexchimp_p007_load_scripts_admin( $hook ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . $plugin['slug'];
    if ( $settings_page != $hook ) {
        return;
    }

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // Load WordPress Color Picker library
    wp_enqueue_style( 'wp-color-picker' );

    // Bootstrap library
    wp_enqueue_style( $plugin['prefix'] . '-bootstrap-css', $plugin['url'] . 'inc/lib/bootstrap/bootstrap.css', array(), $plugin['version'], 'all' );
    wp_enqueue_style( $plugin['prefix'] . '-bootstrap-theme-css', $plugin['url'] . 'inc/lib/bootstrap/bootstrap-theme.css', array(), $plugin['version'], 'all' );
    wp_enqueue_script( $plugin['prefix'] . '-bootstrap-js', $plugin['url'] . 'inc/lib/bootstrap/bootstrap.js', array(), $plugin['version'], false );

    // Font Awesome library
    wp_enqueue_style( $plugin['prefix'] . '-font-awesome-css', $plugin['url'] . 'inc/lib/font-awesome/css/font-awesome.css', array(), $plugin['version'], 'screen' );

    // Other libraries
    wp_enqueue_script( $plugin['prefix'] . '-bootstrap-checkbox-js', $plugin['url'] . 'inc/lib/bootstrap-checkbox.js', array(), $plugin['version'], false );

    // Style sheet
    wp_enqueue_style( $plugin['prefix'] . '-admin-css', $plugin['url'] . 'inc/css/admin.css', array(), $plugin['version'], 'all' );
    wp_enqueue_style( $plugin['prefix'] . '-frontend-css', $plugin['url'] . 'inc/css/frontend.css', array(), $plugin['version'], 'all' );

    // JavaScript
    wp_enqueue_script( $plugin['prefix'] . '-admin-js', $plugin['url'] . 'inc/js/admin.js', array('wp-color-picker'), $plugin['version'], true );

    // Call the function that contains the dynamic JavaScript
    spacexchimp_p007_load_scripts_dynamic_js();

    // Call the function that contains the dynamic CSS
    spacexchimp_p007_load_scripts_dynamic_css();
}
add_action( 'admin_enqueue_scripts', $plugin['prefix'] . '_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 */
function spacexchimp_p007_load_scripts_frontend() {

    // Return if the current page does not match the selected one
    $load_on = spacexchimp_p007_load_on();
    if ( $load_on !== true ) {
        return;
    }

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // Style sheet
    wp_enqueue_style( $plugin['prefix'] . '-frontend-css', $plugin['url'] . 'inc/css/frontend.css', array(), $plugin['version'], 'all' );

    // JavaScript
    wp_enqueue_script( $plugin['prefix'] . '-frontend-js', $plugin['url'] . 'inc/js/frontend.js', array('jquery'), $plugin['version'], true );

    // Call the function that contains the dynamic JavaScript
    spacexchimp_p007_load_scripts_dynamic_js();

    // Call the function that contains the dynamic CSS
    spacexchimp_p007_load_scripts_dynamic_css();
}
add_action( 'wp_enqueue_scripts', $plugin['prefix'] . '_load_scripts_frontend' );
