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
 * @since 4.5
 */
?>
    <!-- SIDEBAR -->
    <div class="inner-sidebar">
        <div id="side-sortables" class="meta-box-sortabless ui-sortable">

            <div class="postbox about">
                <h3 class="title"><?php _e( 'About', $text ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'This plugin allows you to easily add cross browser animated preloader to your website. It will be responsive and compatible with all major browsers. It will work with any theme!', $text ); ?></p>
                </div>
            </div>

            <div class="postbox support">
                <h3 class="title"><?php _e( 'Support', $text ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', $text ); ?></p>
                    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', $text ); ?></a>
                    <p><?php _e( 'Thanks for your support!', $text ); ?></p>
                </div>
            </div>

            <div class="postbox help">
                <h3 class="title"><?php _e( 'Help', $text ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'If you have a question, please read the information in the FAQ section.', $text ); ?></p>
                </div>
            </div>

            <div class="include-banner"></div>

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

                    <div class="postbox" id="settings">
                        <h3 class="title"><?php _e( 'Main Settings', $text ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'There you can configure this plugin.', $text ); ?></p>

                            <table class="form-table">

                                <?php bestpreloader_setting( 'enable_preloader',
                                                             __( 'Enable preloader', $text ),
                                                             '',
                                                             'check'
                                                            );
                                ?>

                                <?php bestpreloader_setting( 'custom-image',
                                                             __( 'Preloader image', $text ),
                                                             __( 'You can set your own image of preloader. To do this, enter the link to the file of image. Leave blank to use the default image of preloader.', $text ),
                                                             'field',
                                                             'http://',
                                                             '50'
                                                            );
                                ?>

                                <?php bestpreloader_setting( 'preloader-size',
                                                             __( 'Preloader image size', $text ),
                                                             __( 'You can set the size of preloaders image (in px).', $text ),
                                                             'field',
                                                             '100',
                                                             '3'
                                                            );
                                ?>

                                <tr>
                                    <th scope='row'><?php _e( 'Background color', $text ); ?></th>
                                    <td>
                                        <input type="text" name="bestpreloader_settings[background-color]" id="bestpreloader_settings[background-color]" value="<?php echo $background_color; ?>" placeholder="#ffffff" class="color-picker background-color">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select the background color of preloader. You can also add html HEX color code.', $text ); ?></td>
                                </tr>

                                <tr>
                                    <th scope='row'><?php _e( 'Display Preloader on', $text ); ?></th>
                                    <td>
                                        <ul>
                                            <li><input type="radio" name="bestpreloader_settings[display-preloader]" value="" <?php checked( '', $display_preloader ); ?> ><?php _e( 'Full Website', $text ); ?><li>
                                            <li><input type="radio" name="bestpreloader_settings[display-preloader]" value="Home Page Only" <?php checked( 'Home Page Only', $display_preloader ); ?> ><?php _e( 'Home Page Only', $text ); ?></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select where preloader need to be appeared.', $text ); ?></td>
                                </tr>

                                <?php bestpreloader_setting( 'seconds',
                                                             __( 'Delay time', $text ),
                                                             __( 'You can set the time (in seconds) before preloader will appear.', $text ),
                                                             'field',
                                                             '0',
                                                             '3'
                                                            );
                                ?>

                            </table>

                            <?php submit_button( __( 'Save changes', $text ), 'primary', 'submit', true ); ?>

                        </div>
                    </div>

                    <div class="postbox" id="preview">
                        <h3 class="title"><?php _e( 'Live Preview', $text ); ?></h3>
                        <div class="inside">
                            <div id="preloader">
                                <div id="preloader-background"></div>
                                <img src="<?php echo $custom_image; ?>" width="<?php echo $preloader_size; ?>" height="<?php echo $preloader_size; ?>" />
                            </div>
                            <style>
                                #preloader-background {
                                    background-color: <?php echo $background_color; ?>;
                                }
                            </style>
                        </div>
                    </div>

                    <div class="postbox" id="support-addition">
                        <h3 class="title"><?php _e( 'Support', $text ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', $text ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', $text ); ?></a>
                            <p><?php _e( 'Thanks for your support!', $text ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- END-FORM -->
<?php
