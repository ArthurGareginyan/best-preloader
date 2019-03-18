<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Hello message - Bootstrap Modal
 */
function spacexchimp_p007_message_hello() {

    // Put value of constants to variables for easier access
    $settings = SPACEXCHIMP_P007_SETTINGS;
    $url = SPACEXCHIMP_P007_URL;
    $text = SPACEXCHIMP_P007_TEXT;

    // Retrieve options from database and declare variables
    $options = get_option( $settings . '_settings' );

    // Exit if options are already set in database
    if ( !empty( $options ) ) {
        return;
    }

    // HTML layout
    ?>
        <div id="hello-message" class="modal fade hello-message" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="<?php echo $url . 'inc/img/spacexchimp-logo.png'; ?>">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <p>
                            <?php _e( 'Hello!', $text ); ?>
                            <?php _e( 'We are the team of Space X-Chimp.', $text ); ?>
                        </p>
                        <p>
                            <?php
                                printf(
                                    __( 'Thank you for installing our plugin! We hope you will love it! %s', $text ),
                                    '&#x1F603;'
                                );
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php

    // Inline JavaScript
    ?>
        <script>
            jQuery(document).ready(function($) {

                // Show the message
                $("#hello-message").modal();

                // Hide the message after 7 seconds
                setTimeout(function() {
                    $('#hello-message').modal('hide');
                }, 7000);
            });
        </script>
    <?php
}

/**
 * Error message (When the old version of plugin installed) - Bootstrap Modal
 */
function spacexchimp_p007_message_error_version() {

    // Put value of constants to variables for easier access
    $settings = SPACEXCHIMP_P007_SETTINGS;
    $text = SPACEXCHIMP_P007_TEXT;

    // Retrieve options from database and declare variables
    $info = get_option( $settings . '_service_info' );
    $old_version = !empty( $info['old_version'] ) ? $info['old_version'] : '0';

    // Exit if this is not the old version of the plugin
    if ( $old_version != '1' ) {
        return;
    }

    // HTML layout
    ?>
        <div id="error-message" class="modal fade error-message" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p><?php _e( 'You have installed an old version of this plugin.', $text ); ?></p>
                        <p><?php _e( 'Please update the plugin to the latest version, and all will be fine.', $text ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php

    // Inline JavaScript
    ?>
        <script>
            jQuery(document).ready(function($) {
                $("#error-message").modal( {backdrop: "static", keyboard: false} );
            });
        </script>
    <?php
}

/**
 * Save message
 */
function spacexchimp_p007_message_save() {

    // Exit if settings are not updated
    if ( !isset( $_GET['settings-updated'] ) ) {
        return;
    }

    // Put value of constants to variables for easier access
    $text = SPACEXCHIMP_P007_TEXT;

    // HTML layout
    ?>
        <div id="message" class="updated">
            <p>
                <i class="fa fa-check" aria-hidden="true"></i>
                <?php _e( 'Settings saved successfully.', $text ); ?>
            </p>
        </div>
    <?php
}
