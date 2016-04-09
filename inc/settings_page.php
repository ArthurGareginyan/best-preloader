<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Render Settings Page
 *
 * @since 2.0
 */
function bestpreloader_render_submenu_page() {

	// Declare variables
    $options = get_option( 'bestpreloader_settings' );

	// Page
	?>
	<div class="wrap">
		<h2>
            <?php _e( 'Best Preloader', 'best-preloader' ); ?>
            <br/>
            <span>
                <?php _e( 'by <a href="http://www.arthurgareginyan.com" target="_blank">Arthur "Berserkr" Gareginyan</a>', 'best-preloader' ); ?>
            <span/>
		</h2>

        <div id="poststuff" class="metabox-holder has-right-sidebar">

            <!-- SIDEBAR -->
            <div class="inner-sidebar">
                <div id="side-sortables" class="meta-box-sortabless ui-sortable">

                    <div id="about" class="postbox">
                        <h3 class="title"><?php _e( 'About', 'best-preloader' ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'To use, select the desired settings, then click "Save Changes". It\'s that simple!', 'best-preloader' ) ?></p>
                        </div>
                    </div>

                    <div id="using" class="postbox">
                        <h3 class="title"><?php _e( 'Using', 'best-preloader' ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'To use, select the desired settings, then click "Save Changes". It\'s that simple!', 'best-preloader' ) ?></p>
                        </div>
                    </div>

                    <div id="help" class="postbox">
                        <h3 class="title"><?php _e( 'Help', 'best-preloader' ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'If you want more options then tell me and I will be happy to add it.', 'best-preloader' ); ?></p>
                            <p><a href="mailto:arthurgareginyan@gmail.com">arthurgareginyan@gmail.com</a></p>
                        </div>
                    </div>

                    <div id="donate" class="postbox">
                        <h3 class="title"><?php _e( 'Donate', 'best-preloader' ); ?></h3>
                        <div class="inside">
                            <img src="<?php echo plugins_url('images/thanks.png', __FILE__); ?>">
                            <p><?php _e( 'If you like this plugin and find it useful, help me to make this plugin even better and keep it up-to-date.', 'best-preloader' ) ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" rel="nofollow">
                                <img src="<?php echo plugins_url('images/btn_donateCC_LG.gif', __FILE__); ?>" alt="Make a donation">
                            </a>
                            <p><?php _e( 'Thanks for your support!', 'best-preloader' ) ?></p>
                        </div>
                    </div>

                    <div id="freelance" class="postbox">
                        <h3 class="title"><?php _e( 'Freelance', 'best-preloader' ) ?></h3>
                        <div class="inside">
                            <img src="<?php echo plugins_url('images/author.png', __FILE__); ?>">
                            <p><?php _e( 'Hello, my name is Arthur and I\'m a freelance web designer and developer.', 'best-preloader' ) ?></p>
                            <p><?php _e( 'Share your thoughts with me. You may have a brilliant idea in your mind and I can make it happen, so let’s get started!', 'best-preloader' ) ?></p>
                            <p><a href="http://www.arthurgareginyan.com/" target="_blank">www.arthurgareginyan.com</a></p>
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

                            <div class="postbox" id="Settings">
                                <h3 class="title"><?php _e( 'Settings', 'best-preloader' ) ?></h3>
                                <div class="inside">
                                    <p class="description"></p>
                                    <table class="form-table">

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Enable preloader', 'best-preloader' ); ?></th>
                                            <td>
                                                <ul>
                                                    <li><input type="radio" name="bestpreloader_settings[enable_preloader]" value="ON" <?php checked('ON', $options['enable_preloader']); ?> ><?php _e( 'ON', 'best-preloader' ); ?></li>
                                                    <li><input type="radio" name="bestpreloader_settings[enable_preloader]" value="" <?php checked('', $options['enable_preloader']); ?> ><?php _e( 'OFF', 'best-preloader' ); ?></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Preloader image', 'best-preloader' ); ?></th>
                                            <td>
                                                <input type="text" name="bestpreloader_settings[custom-image]" id="bestpreloader_settings[custom-image]" value="<?php echo $options['custom-image']; ?>" placeholder="http://" size="50" >
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'You can set your own image of preloader. To do this, enter the link to the file of image. Leave blank to use the default image of preloader.', 'best-preloader' ); ?></td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Preloader image size', 'best-preloader' ); ?></th>
                                            <td>
                                                <input type="text" name="bestpreloader_settings[preloader-size]" id="bestpreloader_settings[preloader-size]" value="<?php echo $options['preloader-size']; ?>" placeholder="100" size="2" >
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'You can set the size of preloaders image (in px).', 'best-preloader' ); ?></td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Background color', 'best-preloader' ); ?></th>
                                            <td>
                                                <input type="text" name="bestpreloader_settings[background-color]" id="bestpreloader_settings[background-color]" value="<?php echo $options['background-color']; ?>" placeholder="#ffffff" class="color-picker">
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'Select the background color of preloader. You can also add html HEX color code.', 'best-preloader' ); ?></td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Display Preloader on', 'best-preloader' ); ?></th>
                                            <td>
                                                <ul>
                                                    <li><input type="radio" name="bestpreloader_settings[display-preloader]" value="" <?php checked('', $options['display-preloader']); ?> ><?php _e( 'Full Website', 'best-preloader' ); ?><li>
                                                    <li><input type="radio" name="bestpreloader_settings[display-preloader]" value="Home Page Only" <?php checked('Home Page Only', $options['display-preloader']); ?> ><?php _e( 'Home Page Only', 'best-preloader' ); ?></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'Select where preloader need to be appeared.', 'best-preloader' ); ?></td>
                                        </tr>

                                    </table>
                                    <?php submit_button( __( 'Save Changes', 'best-preloader' ), 'primary', 'submit', true ); ?>
                                </div>
                            </div>

                            <div class="postbox" id="Preview">
                                <h3 class="title"><?php _e( 'Preview', 'best-preloader' ) ?></h3>
                                <div class="inside">
                                    <p class="description"><?php _e( 'Click "Save Changes" to update this preview.', 'best-preloader' ) ?></p></br>
                                    <div id="preloader-background">
                                        <img src="<?php if ( !empty($options['custom-image']) ) { echo $options['custom-image']; } else { echo plugins_url( 'images/preloader.gif', __FILE__ ); } ?>" width="<?php echo $options['preloader-size']; ?>" height="<?php echo $options['preloader-size']; ?>" />
                                    </div>
                                </div>
                            </div>

                            <style>
                                #preloader-background {
                                    background-color: <?php echo $options['background-color']; ?>;
                                }
                            </style>

                        </form>

                    </div>
                </div>
            </div>
            <!-- END-FORM -->

        </div>

	</div>
	<?php
}