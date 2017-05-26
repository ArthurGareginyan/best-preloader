<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Settings Tab
 *
 * @since 4.2
 */
?>
    <!-- SIDEBAR -->
    <div class="inner-sidebar">
        <div id="side-sortables" class="meta-box-sortabless ui-sortable">

            <div id="about" class="postbox">
                <h3 class="title"><?php _e( 'About', BESTPL_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'This plugin allows you to easily add cross browser animated preloader to your website. It will be responsive and compatible with all major browsers. It will work with any theme!', BESTPL_TEXT ); ?></p>
                </div>
            </div>

            <div id="support" class="postbox">
                <h3 class="title"><?php _e( 'Support', BESTPL_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', BESTPL_TEXT ); ?></p>
                    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', BESTPL_TEXT ); ?></a>
                    <p><?php _e( 'Thanks for your support!', BESTPL_TEXT ); ?></p>
                </div>
            </div>

            <div id="help" class="postbox">
                <h3 class="title"><?php _e( 'Help', BESTPL_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'Got something to say? Need help?', BESTPL_TEXT ); ?></p>
                    <p><a href="mailto:arthurgareginyan@gmail.com?subject=<?php echo BESTPL_NAME; ?>">arthurgareginyan@gmail.com</a></p>
                </div>
            </div>

        </div>
    </div>
    <!-- END-SIDEBAR -->

    <!-- FORM -->
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( BESTPL_SETTINGS . '_settings_group' ); ?>

                    <?php
                        // Get options from the database
                        $options = get_option( BESTPL_SETTINGS . '_settings' );

                        // Set default value if option is empty
                        $display_preloader = !empty( $options['display-preloader'] ) ? $options['display-preloader'] : '';
                        $background_color = !empty( $options['background-color'] ) ? $options['background-color'] : '#ffffff';
                        $custom_image = !empty( $options['custom-image'] ) ? $options['custom-image'] : BESTPL_URL . 'inc/img/preloader.gif';
                        $preloader_size = !empty( $options['preloader-size'] ) ? $options['preloader-size'] : '100';
                    ?>

                    <div class="postbox" id="Settings">
                        <h3 class="title"><?php _e( 'Main Settings', BESTPL_TEXT ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'There you can configure this plugin.', BESTPL_TEXT ); ?></p>

                            <table class="form-table">

                                <?php bestpreloader_setting( 'enable_preloader',
                                                             __( 'Enable preloader', BESTPL_TEXT ),
                                                             '',
                                                             'check'
                                                            );
                                ?>

                                <?php bestpreloader_setting( 'custom-image',
                                                             __( 'Preloader image', BESTPL_TEXT ),
                                                             __( 'You can set your own image of preloader. To do this, enter the link to the file of image. Leave blank to use the default image of preloader.', BESTPL_TEXT ),
                                                             'field',
                                                             'http://',
                                                             '50'
                                                            );
                                ?>

                                <?php bestpreloader_setting( 'preloader-size',
                                                             __( 'Preloader image size', BESTPL_TEXT ),
                                                             __( 'You can set the size of preloaders image (in px).', BESTPL_TEXT ),
                                                             'field',
                                                             '100',
                                                             '3'
                                                            );
                                ?>

                                <tr>
                                    <th scope='row'><?php _e( 'Background color', BESTPL_TEXT ); ?></th>
                                    <td>
                                        <input type="text" name="bestpreloader_settings[background-color]" id="bestpreloader_settings[background-color]" value="<?php echo $background_color; ?>" placeholder="#ffffff" class="color-picker">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select the background color of preloader. You can also add html HEX color code.', BESTPL_TEXT ); ?></td>
                                </tr>

                                <tr>
                                    <th scope='row'><?php _e( 'Display Preloader on', BESTPL_TEXT ); ?></th>
                                    <td>
                                        <ul>
                                            <li><input type="radio" name="bestpreloader_settings[display-preloader]" value="" <?php checked( '', $display_preloader ); ?> ><?php _e( 'Full Website', BESTPL_TEXT ); ?><li>
                                            <li><input type="radio" name="bestpreloader_settings[display-preloader]" value="Home Page Only" <?php checked( 'Home Page Only', $display_preloader ); ?> ><?php _e( 'Home Page Only', BESTPL_TEXT ); ?></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select where preloader need to be appeared.', BESTPL_TEXT ); ?></td>
                                </tr>

                                <?php bestpreloader_setting( 'seconds',
                                                             __( 'Delay time', BESTPL_TEXT ),
                                                             __( 'You can set the time (in seconds) before preloader will appear.', BESTPL_TEXT ),
                                                             'field',
                                                             '0',
                                                             '3'
                                                            );
                                ?>

                            </table>

                            <?php submit_button( __( 'Save Changes', BESTPL_TEXT ), 'primary', 'submit', true ); ?>

                        </div>
                    </div>

                    <div class="postbox" id="Preview">
                        <h3 class="title"><?php _e( 'Preview', BESTPL_TEXT ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Click the "Save Changes" button to update this preview.', BESTPL_TEXT ); ?></p><br>
                            <div id="preloader">
                                <div id="preloader-background"></div>
                                <img src="<?php echo $custom_image; ?>" width="<?php echo $preloader_size; ?>" height="<?php echo $preloader_size; ?>" />
                            </div>
                            <style>
                                #preloader-background {
                                    background-color: <?php echo $options['background-color']; ?>;
                                }
                            </style>
                        </div>
                    </div>

                    <div class="postbox" id="support-addition">
                        <h3 class="title"><?php _e( 'Support', BESTPL_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', BESTPL_TEXT ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', BESTPL_TEXT ); ?></a>
                            <p><?php _e( 'Thanks for your support!', BESTPL_TEXT ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- END-FORM -->
<?php
