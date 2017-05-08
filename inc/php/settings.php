<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Render Settings Tab
 *
 * @since 3.2
 */
?>
    <!-- SIDEBAR -->
    <div class="inner-sidebar">
        <div id="side-sortables" class="meta-box-sortabless ui-sortable">

            <div id="about" class="postbox">
                <h3 class="title"><?php _e( 'About', BESTPL_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'This plugin allows you to easily add cross browser animated preloader to your website. It will be responsive and compatible with all major browsers. It will work with any theme!
', BESTPL_TEXT ); ?></p>
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
                    <p><a href="mailto:arthurgareginyan@gmail.com?subject=Best Preloader">arthurgareginyan@gmail.com</a></p>
                </div>
            </div>

        </div>
    </div>
    <!-- END-SIDEBAR -->

    <!-- FORM -->
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form name="bestpreloader-form" action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( 'bestpreloader_settings_group' ); ?>

                    <?php
                        // Get options from the BD
                        $options = get_option( 'bestpreloader_settings' );
                        $display_preloader = isset( $options['display-preloader'] ) && !empty( $options['display-preloader'] ) ? $options['display-preloader'] : '';
                        
                    ?>

                    <div class="postbox" id="Settings">
                        <h3 class="title"><?php _e( 'Main Settings', BESTPL_TEXT ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'There you can configure this plugin.', BESTPL_TEXT ); ?></p>

                            <table class="form-table">

                                <tr>
                                    <th scope='row'><?php _e( 'Enable preloader', BESTPL_TEXT ); ?></th>
                                    <td>
                                        <input type="checkbox" name="bestpreloader_settings[enable_preloader]" id="bestpreloader_settings[enable_preloader]" value="ON" <?php if ( !empty($options['enable_preloader']) ) { checked( $options['enable_preloader'], "ON" ); } ?> >
                                    </td>
                                </tr>

                                <tr>
                                    <th scope='row'><?php _e( 'Preloader image', BESTPL_TEXT ); ?></th>
                                    <td>
                                        <input type="text" name="bestpreloader_settings[custom-image]" id="bestpreloader_settings[custom-image]" value="<?php if ( !empty($options['custom-image']) ) {  echo $options['custom-image']; } ?>" placeholder="http://" size="50" >
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'You can set your own image of preloader. To do this, enter the link to the file of image. Leave blank to use the default image of preloader.', BESTPL_TEXT ); ?></td>
                                </tr>

                                <tr>
                                    <th scope='row'><?php _e( 'Preloader image size', BESTPL_TEXT ); ?></th>
                                    <td>
                                        <input type="text" name="bestpreloader_settings[preloader-size]" id="bestpreloader_settings[preloader-size]" value="<?php if ( !empty($options['preloader-size']) ) { echo $options['preloader-size']; } ?>" placeholder="100" size="3" >
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'You can set the size of preloaders image (in px).', BESTPL_TEXT ); ?></td>
                                </tr>

                                <tr>
                                    <th scope='row'><?php _e( 'Background color', BESTPL_TEXT ); ?></th>
                                    <td>
                                        <input type="text" name="bestpreloader_settings[background-color]" id="bestpreloader_settings[background-color]" value="<?php if ( !empty($options['background-color']) ) { echo $options['background-color']; } ?>" placeholder="#ffffff" class="color-picker">
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

                                <tr>
                                    <th scope='row'><?php _e( 'Delay time', BESTPL_TEXT ); ?></th>
                                    <td>
                                        <input type="text" name="bestpreloader_settings[seconds]" id="bestpreloader_settings[seconds]" value="<?php if ( !empty($options['seconds']) ) { echo $options['seconds']; } ?>" placeholder="0" size="2" >
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'You can set the time (in seconds) before preloader will appear.', BESTPL_TEXT ); ?></td>
                                </tr>

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
                                <img src="<?php if ( !empty($options['custom-image']) ) { echo $options['custom-image']; } else { echo BESTPL_URL . 'inc/img/preloader.gif'; } ?>" width="<?php echo $options['preloader-size']; ?>" height="<?php echo $options['preloader-size']; ?>" />
                            </div>
                            <style>
                                #preloader-background {
                                    background-color: <?php echo $options['background-color']; ?>;
                                }
                            </style>
                        </div>
                    </div>

                    <div id="support-addition" class="postbox">
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
