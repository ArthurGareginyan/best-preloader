<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Callback function that returns an array with the value of the plugin options
 * @return array
 */
function spacexchimp_p007_options() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Retrieve options from database
    $options = get_option( $plugin['settings'] . '_settings' );

    // Make the "$options" array if the plugin options data in the database is not exist
    if ( ! is_array( $options ) ) {
        $options = array();
    }

    // Create an array with options
    $array = $options;

    // Set default value if option is empty
    $list = array(
        'background-color' => '#fff',
        'custom-image' => $plugin['url'] . 'inc/img/preloader.gif',
        'display-preloader' => '',
        'hidden_scrollto' => '0',
        'preloader-size' => '100',
        'seconds' => '',
    );
    foreach ( $list as $name => $default ) {
        $array[$name] = !empty( $options[$name] ) ? $options[$name] : $default;
    }

    // Sanitize data
    //$array['background-color'] = esc_textarea( $array['background-color'] );
    //$array['custom-image'] = esc_textarea( $array['custom-image'] );
    //$array['display-preloader'] = esc_textarea( $array['display-preloader'] );
    //$array['hidden_scrollto'] = esc_textarea( $array['hidden_scrollto'] );
    //$array['preloader-size'] = esc_textarea( $array['preloader-size'] );
    //$array['seconds'] = esc_textarea( $array['seconds'] );

    // Modify data


    // Return the processed data
    return $array;
}
