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
                    <?php settings_fields( $plugin['settings'] . '_settings_group' ); ?>

                    <!-- SUBMIT -->
                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-lg button-save-top">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        <span><?php _e( 'Save changes', $plugin['text'] ); ?></span>
                    </button>
                    <!-- END SUBMIT -->

                    <div class="postbox" id="options-group-preloader">
                        <h3 class="title"><?php _e( 'Preloader', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Here you can customize the preloader.', $plugin['text'] ); ?></p>
                            <table class="form-table">
                                <?php
                                    spacexchimp_p007_control_field( 'custom-image',
                                                                    __( 'Preloader image', $plugin['text'] ),
                                                                    __( 'You can set your own image of preloader. To do this, enter the link to the file of image. Leave blank to use the default image of preloader.', $plugin['text'] ),
                                                                    'http://'
                                                                  );
                                    spacexchimp_p007_control_separator();
                                    spacexchimp_p007_control_color( 'background-color',
                                                                    __( 'Background color', $plugin['text'] ),
                                                                    __( 'Select the background color of preloader. You can also add html HEX color code.', $plugin['text'] ),
                                                                    '#fff'
                                                                  );
                                    spacexchimp_p007_control_separator();
                                    spacexchimp_p007_control_number( 'preloader-size',
                                                                     __( 'Preloader image size', $plugin['text'] ),
                                                                     __( 'You can set the size of preloaders image (in pixels).', $plugin['text'] ),
                                                                     '100'
                                                                   );
                                ?>
                            </table>
                        </div>
                    </div>

                    <div class="postbox" id="options-group-effects">
                        <h3 class="title"><?php _e( 'Effects', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Here you can customize the effects.', $plugin['text'] ); ?></p>
                            <table class="form-table">
                                <?php
                                    spacexchimp_p007_control_number( 'seconds',
                                                                     __( 'Delay time', $plugin['text'] ),
                                                                     __( 'You can set the time (in seconds) before preloader will appear.', $plugin['text'] ),
                                                                     '0'
                                                                   );
                                ?>
                            </table>
                        </div>
                    </div>

                    <div class="postbox" id="options-group-autoload">
                        <h3 class="title"><?php _e( 'Autoload', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Here you can configure the autoload.', $plugin['text'] ); ?></p>
                            <table class="form-table">
                                <?php
                                    spacexchimp_p007_control_choice( 'display-preloader',
                                                                     array(
                                                                            ''               => __( 'Every frontend page', $plugin['text'] ),
                                                                            'Home Page Only' => __( 'Home Page Only', $plugin['text'] )
                                                                          ),
                                                                     __( 'Display preloader on', $plugin['text'] ),
                                                                     __( 'Select where preloader need to be appeared.', $plugin['text'] ),
                                                                     ''
                                                                   );
                                ?>
                            </table>
                        </div>
                    </div>

                    <!-- HIDDEN -->
                    <?php
                        spacexchimp_p007_control_hidden( 'hidden_scrollto',
                                                         '0'
                                                       );
                    ?>
                    <!-- END HIDDEN -->

                    <!-- SUBMIT -->
                    <input type="submit" name="submit" id="submit" class="btn btn-default btn-lg button-save-main" value="<?php _e( 'Save changes', $plugin['text'] ); ?>">
                    <!-- END SUBMIT -->

                    <!-- PREVIEW -->
                    <div class="postbox" id="preview">
                        <h3 class="title"><?php _e( 'Live preview', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Click the "Save changes" button to update this preview.', $plugin['text'] ); ?></p><br>
                            <div class="text-center">
                                <?php spacexchimp_p007_generator(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- END PREVIEW -->

                    <!-- SUPPORT -->
                    <div class="postbox" id="support-addition">
                        <h3 class="title"><?php _e( 'Support', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'Every little contribution helps to cover our costs and allows us to spend more time creating things for awesome people like you to enjoy.', $plugin['text'] ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="btn btn-default button-labeled">
                                <span class="btn-label">
                                    <img src="<?php echo $plugin['url'] . 'inc/img/paypal.svg'; ?>" alt="PayPal">
                                </span>
                                <?php _e( 'Donate with PayPal', $plugin['text'] ); ?>
                            </a>
                            <p><?php _e( 'Thanks for your support!', $plugin['text'] ); ?></p>
                        </div>
                    </div>
                    <!-- END SUPPORT -->

                </form>

            </div>
        </div>
    </div>
<?php
