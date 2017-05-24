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
 * @since 4.1
 */
function bestpreloader_load_scripts_admin( $hook ) {

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . BESTPL_SLUG;
    if ( $settings_page != $hook ) {
        return;
    }

    // Style sheet
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( BESTPL_PREFIX . '-admin-css', BESTPL_URL . 'inc/css/admin.css' );

    // JavaScript
    wp_enqueue_script( BESTPL_PREFIX . '-admin-js', BESTPL_URL . 'inc/js/admin.js', array('wp-color-picker'), false, true );

    // Bootstrap library
    wp_enqueue_style( BESTPL_PREFIX . '-bootstrap-css', BESTPL_URL . 'inc/lib/bootstrap/bootstrap.css' );
    wp_enqueue_style( BESTPL_PREFIX . '-bootstrap-theme-css', BESTPL_URL . 'inc/lib/bootstrap/bootstrap-theme.css' );
    wp_enqueue_script( BESTPL_PREFIX . '-bootstrap-js', BESTPL_URL . 'inc/lib/bootstrap/bootstrap.js' );

    // Other libraries
    wp_enqueue_script( BESTPL_PREFIX . '-bootstrap-checkbox-js', BESTPL_URL . 'inc/lib/bootstrap-checkbox.js' );

}
add_action( 'admin_enqueue_scripts', BESTPL_PREFIX . '_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 *
 * @since 4.1
 */
function bestpreloader_load_scripts_frontend() {

    // Read options from BD
    $options = get_option( BESTPL_SETTINGS . '_settings' );
    $display_preloader = isset( $options['display-preloader'] ) && !empty( $options['display-preloader'] ) ? $options['display-preloader'] : '';

    // Load JQuery library
    wp_enqueue_script( 'jquery' );

    // Enqueue script and style sheet of preloader on front end
    if ( !empty( $options['enable_preloader'] ) AND $options['enable_preloader'] == 'ON' OR $options['enable_preloader'] == 'on' ) {

        if ( $display_preloader == '' || $display_preloader == 'Home Page Only' && is_home() || $display_preloader == 'Home Page Only' && is_front_page() ) {
            
            wp_enqueue_style( BESTPL_PREFIX . '-frontend-css', BESTPL_URL . 'inc/css/frontend.css' );
            wp_enqueue_script( BESTPL_PREFIX . '-frontend-js', BESTPL_URL . 'inc/js/frontend.js', array('jquery'), false, true );
        }
    }

    // Dynamic JS. Create JS object and injected it into the JS file
    $script_params = array(
                           'seconds' => $options['seconds'],
                           );
    wp_localize_script( BESTPL_PREFIX . '-frontend-js', BESTPL_PREFIX . '_scriptParams', $script_params );

}
add_action( 'wp_enqueue_scripts', BESTPL_PREFIX . '_load_scripts_frontend' );
