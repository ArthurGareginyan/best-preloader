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
    $list = array(
        'background-color' => (string) '#fff', // _control_color
        'custom-image' => (string) $plugin['url'] . 'inc/img/preloader.gif', // _control_field
        'display-preloader' => (string) '', // _control_choice
        'hidden_scrollto' => (integer) '0', // _control_hidden
        'preloader-size' => (integer) '100', // _control_number
        'seconds' => (integer) '0', // _control_number
    );
    foreach ( $list as $name => $default ) {

        // Set default value if option is empty
        $array[$name] = !empty( $options[$name] ) ? $options[$name] : $default;

        // Cast, validate and sanitize by type of option
        if ( is_string( $default ) === true ) {
            $array[$name] = (string) $array[$name];
        } elseif ( is_int( $default ) === true ) {
            $array[$name] = (integer) $array[$name];
        } elseif ( is_bool( $default ) === true ) {
            $array[$name] = filter_var( $array[$name], FILTER_VALIDATE_BOOLEAN );
        }
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
