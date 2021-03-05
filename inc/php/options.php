<?php

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
    $array['hidden_scrollto'] = !empty( $options['hidden_scrollto'] ) ? $options['hidden_scrollto'] : '0';
    $array['display-preloader'] = !empty( $options['display-preloader'] ) ? $options['display-preloader'] : '';
    $array['seconds'] = !empty( $options['seconds'] ) ? $options['seconds'] : '';
    $array['background-color'] = !empty( $options['background-color'] ) ? $options['background-color'] : '#fff';
    $array['custom-image'] = !empty( $options['custom-image'] ) ? $options['custom-image'] : $plugin['url'] . 'inc/img/preloader.gif';
    $array['preloader-size'] = !empty( $options['preloader-size'] ) ? $options['preloader-size'] : '100';

    // Sanitize data


    // Modify data


    // Return the processed data
    return $array;
}
