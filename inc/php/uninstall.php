<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Delete options on uninstall
 *
 * @since 4.1
 */
function bestpreloader_uninstall() {
    delete_option( BESTPL_SETTINGS . '_settings' );
}
register_uninstall_hook( __FILE__, BESTPL_PREFIX . '_uninstall' );
