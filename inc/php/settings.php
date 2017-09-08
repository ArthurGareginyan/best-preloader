<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Settings Tab Content
 */
?>
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( SPACEXCHIMP_P007_SETTINGS . '_settings_group' ); ?>

                    <?php
                        // Get options from the database
                        $options = get_option( SPACEXCHIMP_P007_SETTINGS . '_settings' );

                        // Set default value if option is empty
                        $display_preloader = !empty( $options['display-preloader'] ) ? $options['display-preloader'] : '';
                        $background_color = !empty( $options['background-color'] ) ? $options['background-color'] : '#ffffff';
                        $custom_image = !empty( $options['custom-image'] ) ? $options['custom-image'] : SPACEXCHIMP_P007_URL . 'inc/img/preloader.gif';
                        $preloader_size = !empty( $options['preloader-size'] ) ? $options['preloader-size'] : '100';
                    ?>

                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-lg button-save-top">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        <span><?php _e( 'Save changes', $text ); ?></span>
                    </button>

                    <div class="postbox" id="settings">
                        <h3 class="title"><?php _e( 'Main Settings', $text ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'There you can configure this plugin.', $text ); ?></p>
                            <table class="form-table">
                                <?php
                                    spacexchimp_p007_control_switch( 'enable_preloader',
                                                                     __( 'Enable preloader', $text ),
                                                                     __( 'Enable or disable this plugin.', $text )
                                                                   );
                                    spacexchimp_p007_control_field( 'custom-image',
                                                                    __( 'Preloader image', $text ),
                                                                    __( 'You can set your own image of preloader. To do this, enter the link to the file of image. Leave blank to use the default image of preloader.', $text ),
                                                                    'http://'
                                                                  );
                                    spacexchimp_p007_control_number( 'preloader-size',
                                                                     __( 'Preloader image size', $text ),
                                                                     __( 'You can set the size of preloaders image (in pixels).', $text ),
                                                                     '100'
                                                                   );
                                    spacexchimp_p007_control_color( 'background-color',
                                                                    __( 'Background color', $text ),
                                                                    __( 'Select the background color of preloader. You can also add html HEX color code.', $text ),
                                                                    '#ffffff'
                                                                  );
                                ?>

                                <tr>
                                    <th scope='row'><?php _e( 'Display Preloader on', $text ); ?></th>
                                    <td>
                                        <ul>
                                            <li><input type="radio" name="spacexchimp_p007_settings[display-preloader]" value="" <?php checked( '', $display_preloader ); ?> ><?php _e( 'Full Website', $text ); ?><li>
                                            <li><input type="radio" name="spacexchimp_p007_settings[display-preloader]" value="Home Page Only" <?php checked( 'Home Page Only', $display_preloader ); ?> ><?php _e( 'Home Page Only', $text ); ?></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select where preloader need to be appeared.', $text ); ?></td>
                                </tr>

                                <?php
                                    spacexchimp_p007_control_number( 'seconds',
                                                                     __( 'Delay time', $text ),
                                                                     __( 'You can set the time (in seconds) before preloader will appear.', $text ),
                                                                     '0'
                                                                   );
                                ?>
                            </table>
                        </div>
                    </div>

                    <input type="submit" name="submit" id="submit" class="btn btn-default btn-lg button-save-main" value="<?php _e( 'Save changes', $text ); ?>">

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
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="btn btn-default button-labeled">
                                                        <span class="btn-label">
                                                            <img src="<?php echo SPACEXCHIMP_P007_URL . 'inc/img/paypal.svg'; ?>" alt="PayPal">
                                                        </span>
                                                        <?php _e( 'Donate with PayPal', $text ); ?>
                                                </a>
                            <p><?php _e( 'Thanks for your support!', $text ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
<?php
