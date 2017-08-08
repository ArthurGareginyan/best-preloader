<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Base for the _load_scripts hook
 *
 * @since 4.5
 */
function bestpreloader_load_scripts_base( $options ) {

    // Put value of constants to variables for easier access
    $slug = BESTPL_SLUG;
    $prefix = BESTPL_PREFIX;
    $url = BESTPL_URL;

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // Style sheet
    wp_enqueue_style( $prefix . '-frontend-css', $url . 'inc/css/frontend.css' );

    // Dynamic CSS. Create CSS and injected it into the stylesheet
    $backgroun_color = !empty( $options['background-color'] ) ? $options['background-color'] : '#ffffff';
    $image = !empty( $options['custom-image'] ) ? $options['custom-image'] : BESTPL_URL . 'inc/img/preloader.gif';
    $preloader_size = !empty( $options['preloader-size'] ) ? $options['preloader-size'] : '100';
    $custom_css = "
                    #preloader {
                        display: none;
                    }
                    #preloader-background {
                        background-color: " . $backgroun_color . ";
                    }
                    #preloader-status {
                        background-image:url(" . $image . ");
                        -moz-background-size: " . $preloader_size . "px " . $preloader_size . "px;
                        -o-background-size: " . $preloader_size . "px " . $preloader_size . "px;
                        -webkit-background-size: " . $preloader_size . "px " . $preloader_size . "px;
                    }
                  ";
    wp_add_inline_style( $prefix . '-frontend-css', $custom_css );

}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 4.5
 */
function bestpreloader_load_scripts_admin( $hook ) {

    // Put value of constants to variables for easier access
    $slug = BESTPL_SLUG;
    $prefix = BESTPL_PREFIX;
    $url = BESTPL_URL;
    $settings = BESTPL_SETTINGS;

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . $slug;
    if ( $settings_page != $hook ) {
        return;
    }

    // Read options from database
    $options = get_option( $settings . '_settings' );

    // Load WP Color Picker library
    wp_enqueue_style( 'wp-color-picker' );

    // Bootstrap library
    wp_enqueue_style( $prefix . '-bootstrap-css', $url . 'inc/lib/bootstrap/bootstrap.css' );
    wp_enqueue_style( $prefix . '-bootstrap-theme-css', $url . 'inc/lib/bootstrap/bootstrap-theme.css' );
    wp_enqueue_script( $prefix . '-bootstrap-js', $url . 'inc/lib/bootstrap/bootstrap.js' );

    // Other libraries
    wp_enqueue_script( $prefix . '-bootstrap-checkbox-js', $url . 'inc/lib/bootstrap-checkbox.js' );

    // Style sheet
    wp_enqueue_style( $prefix . '-admin-css', $url . 'inc/css/admin.css' );

    // JavaScript
    wp_enqueue_script( $prefix . '-admin-js', $url . 'inc/js/admin.js', array('wp-color-picker'), false, true );

    // Dynamic JS. Create JS object and injected it into the JS file
    $plugin_url = BESTPL_URL;
    $script_params = array(
                           'plugin_url' => $plugin_url
                           );
    wp_localize_script( $prefix . '-admin-js', $prefix . '_scriptParams', $script_params );

    // Call the function that contain a basis of scripts
    bestpreloader_load_scripts_base( $options );

}
add_action( 'admin_enqueue_scripts', BESTPL_PREFIX . '_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 *
 * @since 4.5
 */
function bestpreloader_load_scripts_frontend() {

    // Put value of constants to variables for easier access
    $slug = BESTPL_SLUG;
    $prefix = BESTPL_PREFIX;
    $url = BESTPL_URL;
    $settings = BESTPL_SETTINGS;

    // Read options from database and declare variables
    $options = get_option( $settings . '_settings' );
    $display_on = !empty( $options['display-preloader'] ) ? $options['display-preloader'] : '';

    // Return if the button is disabled
    if ( empty( $options['enable_preloader'] ) ) {
        return;
    }

    // If enabled on current page
    if ( $display_on == '' OR $display_on == 'Home Page Only' AND is_home() OR $display_on == 'Home Page Only' AND is_front_page() ) {

        // Call the function that contain a basis of scripts
        bestpreloader_load_scripts_base( $options );

        // JavaScript
        wp_enqueue_script( $prefix . '-frontend-js', $url . 'inc/js/frontend.js', array('jquery'), false, true );

        // Dynamic JS. Create JS object and injected it into the JS file
        $plugin_url = !empty( $options['seconds'] ) ? $options['seconds'] : '';
        $script_params = array(
                               'seconds' => $options['seconds']
                               );
        wp_localize_script( $prefix . '-frontend-js', $prefix . '_scriptParams', $script_params );

    }

}
add_action( 'wp_enqueue_scripts', BESTPL_PREFIX . '_load_scripts_frontend' );
