<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Load scripts and style sheet for settings page
 *
 * @since 4.4
 */
function bestpreloader_load_scripts_admin( $hook ) {

    // Put value of constants to variables for easier access
    $slug = BESTPL_SLUG;
    $prefix = BESTPL_PREFIX;
    $url = BESTPL_URL;

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . $slug;
    if ( $settings_page != $hook ) {
        return;
    }

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // Style sheet
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( $prefix . '-admin-css', $url . 'inc/css/admin.css' );

    // JavaScript
    wp_enqueue_script( $prefix . '-admin-js', $url . 'inc/js/admin.js', array('wp-color-picker'), false, true );

    // Bootstrap library
    wp_enqueue_style( $prefix . '-bootstrap-css', $url . 'inc/lib/bootstrap/bootstrap.css' );
    wp_enqueue_style( $prefix . '-bootstrap-theme-css', $url . 'inc/lib/bootstrap/bootstrap-theme.css' );
    wp_enqueue_script( $prefix . '-bootstrap-js', $url . 'inc/lib/bootstrap/bootstrap.js' );

    // Other libraries
    wp_enqueue_script( $prefix . '-bootstrap-checkbox-js', $url . 'inc/lib/bootstrap-checkbox.js' );

}
add_action( 'admin_enqueue_scripts', BESTPL_PREFIX . '_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 *
 * @since 4.4
 */
function bestpreloader_load_scripts_frontend() {

    // Put value of constants to variables for easier access
    $slug = BESTPL_SLUG;
    $prefix = BESTPL_PREFIX;
    $url = BESTPL_URL;
    $settings = BESTPL_SETTINGS;

    // Read options from BD
    $options = get_option( $settings . '_settings' );
    $display_preloader = isset( $options['display-preloader'] ) && !empty( $options['display-preloader'] ) ? $options['display-preloader'] : '';

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // Enqueue script and style sheet of preloader on front end
    if ( !empty( $options['enable_preloader'] ) AND $options['enable_preloader'] == 'ON' OR $options['enable_preloader'] == 'on' ) {

        if ( $display_preloader == '' || $display_preloader == 'Home Page Only' && is_home() || $display_preloader == 'Home Page Only' && is_front_page() ) {
            
            wp_enqueue_style( $prefix . '-frontend-css', $url . 'inc/css/frontend.css' );
            wp_enqueue_script( $prefix . '-frontend-js', $url . 'inc/js/frontend.js', array('jquery'), false, true );
        }
    }

    // Dynamic JS. Create JS object and injected it into the JS file
    $script_params = array(
                           'seconds' => $options['seconds'],
                           );
    wp_localize_script( $prefix . '-frontend-js', $prefix . '_scriptParams', $script_params );

}
add_action( 'wp_enqueue_scripts', BESTPL_PREFIX . '_load_scripts_frontend' );
