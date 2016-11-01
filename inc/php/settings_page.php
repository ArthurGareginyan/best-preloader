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
 * @since 3.2
 */
function bestpreloader_render_submenu_page() {

	// Declare variables
    $options = get_option( 'bestpreloader_settings' );

	// Page
	?>
	<div class="wrap">
		<h2>
            <?php _e( 'Best Preloader', BESTPL_TEXT ); ?>
            <br/>
            <span>
                <?php _e( 'by <a href="http://www.arthurgareginyan.com" target="_blank">Arthur Gareginyan</a>', BESTPL_TEXT ); ?>
            <span/>
		</h2>

        <div id="poststuff" class="metabox-holder has-right-sidebar">

            <!-- SIDEBAR -->
            <div class="inner-sidebar">
                <div id="side-sortables" class="meta-box-sortabless ui-sortable">

                    <div id="about" class="postbox">
                        <h3 class="title"><?php _e( 'About', BESTPL_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'To use, select the desired settings, then click "Save Changes". It\'s that simple!', BESTPL_TEXT ); ?></p>
                        </div>
                    </div>

                    <div id="using" class="postbox">
                        <h3 class="title"><?php _e( 'Using', BESTPL_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'To use, select the desired settings, then click "Save Changes". It\'s that simple!', BESTPL_TEXT ); ?></p>
                        </div>
                    </div>

                    <div id="help" class="postbox">
                        <h3 class="title"><?php _e( 'Help', BESTPL_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'Got something to say? Need help?', BESTPL_TEXT ); ?></p>
                            <p><a href="mailto:arthurgareginyan@gmail.com?subject=Best Preloader">arthurgareginyan@gmail.com</a></p>
                        </div>
                    </div>

                    <div id="donate" class="postbox">
                        <h3 class="title"><?php _e( 'Donate', BESTPL_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', BESTPL_TEXT ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" rel="nofollow">
                                <img src="<?php echo plugins_url('../img/btn_donateCC_LG.gif', __FILE__); ?>" alt="Make a donation">
                            </a>
                            <p><?php _e( 'Thanks for your support!', BESTPL_TEXT ); ?></p>
                        </div>
                    </div>

                    <a href="//www.iconfinder.com/?ref=ArthurGareginyan" target="_blank" rel="nofollow">
                        <img style="border:0px" src="<?php echo plugins_url('../img/banner.png', __FILE__); ?>" width="280" height="180" alt="">
                    </a>

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
                                <h3 class="title"><?php _e( 'Settings', BESTPL_TEXT ); ?></h3>
                                <div class="inside">
                                    <p class="description"></p>
                                    <table class="form-table">

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Enable preloader', BESTPL_TEXT ); ?></th>
                                            <td>
                                                <input type="checkbox" name="bestpreloader_settings[enable_preloader]" id="bestpreloader_settings[enable_preloader]" value="ON" <?php if ( !empty($options['enable_preloader']) ) { checked( $options['enable_preloader'], "ON" ); } ?> >
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Preloader image', BESTPL_TEXT ); ?></th>
                                            <td>
                                                <input type="text" name="bestpreloader_settings[custom-image]" id="bestpreloader_settings[custom-image]" value="<?php if ( !empty($options['custom-image']) ) {  echo $options['custom-image']; } ?>" placeholder="http://" size="50" >
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'You can set your own image of preloader. To do this, enter the link to the file of image. Leave blank to use the default image of preloader.', BESTPL_TEXT ); ?></td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Preloader image size', BESTPL_TEXT ); ?></th>
                                            <td>
                                                <input type="text" name="bestpreloader_settings[preloader-size]" id="bestpreloader_settings[preloader-size]" value="<?php if ( !empty($options['preloader-size']) ) { echo $options['preloader-size']; } ?>" placeholder="100" size="3" >
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'You can set the size of preloaders image (in px).', BESTPL_TEXT ); ?></td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Background color', BESTPL_TEXT ); ?></th>
                                            <td>
                                                <input type="text" name="bestpreloader_settings[background-color]" id="bestpreloader_settings[background-color]" value="<?php if ( !empty($options['background-color']) ) { echo $options['background-color']; } ?>" placeholder="#ffffff" class="color-picker">
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'Select the background color of preloader. You can also add html HEX color code.', BESTPL_TEXT ); ?></td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Display Preloader on', BESTPL_TEXT ); ?></th>
                                            <td>
                                                <ul>
                                                    <li><input type="radio" name="bestpreloader_settings[display-preloader]" value="" <?php checked('', $options['display-preloader']); ?> ><?php _e( 'Full Website', BESTPL_TEXT ); ?><li>
                                                    <li><input type="radio" name="bestpreloader_settings[display-preloader]" value="Home Page Only" <?php checked('Home Page Only', $options['display-preloader']); ?> ><?php _e( 'Home Page Only', BESTPL_TEXT ); ?></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'Select where preloader need to be appeared.', BESTPL_TEXT ); ?></td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Delay time', BESTPL_TEXT ); ?></th>
                                            <td>
                                                <input type="text" name="bestpreloader_settings[seconds]" id="bestpreloader_settings[seconds]" value="<?php if ( !empty($options['seconds']) ) { echo $options['seconds']; } ?>" placeholder="0" size="2" >
                                            </td>
                                        </tr>
                                        <tr valign='top'>
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
                                    <p class="description"><?php _e( 'Click "Save Changes" to update this preview.', BESTPL_TEXT ); ?></p></br>
                                    <div id="preloader-background">
                                        <img src="<?php if ( !empty($options['custom-image']) ) { echo $options['custom-image']; } else { echo plugins_url( '../img/preloader.gif', __FILE__ ); } ?>" width="<?php echo $options['preloader-size']; ?>" height="<?php echo $options['preloader-size']; ?>" />
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