<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render checkboxes and fields for saving settings data to BD
 *
 * @since 4.1
 */
function bestpreloader_setting( $name, $label, $help=null, $field=null, $placeholder=null, $size=null ) {

    // Read options from BD
    $options = get_option( BESTPL_SETTINGS . '_settings' );

    if ( !empty( $options[$name] ) ) {
        $value = esc_textarea( $options[$name] );
    } else {
        $value = "";
    }

    // Generate the table
    if ( !empty( $options[$name] ) ) {
        $checked = "checked='checked'";
    } else {
        $checked = "";
    }

    if ( $field == "check" ) {
        $input = "<input type='checkbox' name='" . BESTPL_SETTINGS . "_settings[$name]' id='" . BESTPL_SETTINGS . "_settings[$name]' $checked >";
    } elseif ( $field == "field" ) {
        $input = "<input type='text' name='" . BESTPL_SETTINGS . "_settings[$name]' id='" . BESTPL_SETTINGS . "_settings[$name]' size='$size' value='$value' placeholder='$placeholder' >";
    }

    // Put table to the variables $out and $help_out
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    $input
                </td>
            </tr>";
    if ( !empty( $help ) ) {
        $help_out = "<tr>
                        <td></td>
                        <td class='help-text'>
                            $help
                        </td>
                     </tr>";
    } else {
        $help_out = "";
    }

    // Print the generated table
    echo $out . $help_out;
}

/**
 * Generate the CSS of preloader from options and add it to head section of website
 *
 * @since 4.1
 */
function bestpreloader_css_options() {

    // Read options from BD and declare variables
    $options = get_option( BESTPL_SETTINGS . '_settings' );

    if ( !empty( $options['background-color'] ) ) {
        $backgroun_color = $options['background-color'];
    } else {
        $backgroun_color = "#ffffff";
    }

    if ( !empty( $options['preloader-size'] ) ) {
        $preloader_size = $options['preloader-size'];
    } else {
        $preloader_size = "100";
    }

    if ( !empty( $options['custom-image'] ) ) {
        $image = $options['custom-image'];
    } else {
        $image = BESTPL_URL . 'inc/img/preloader.gif';
    }

    ?>
        <style type="text/css">
            #preloader {
                display: none;
            }
            #preloader-background {
                background-color: <?php echo $backgroun_color; ?>;
            }
            #preloader-status {
                background-image:url(<?php echo $image; ?>);
                -moz-background-size: <?php echo $preloader_size; ?>px <?php echo $preloader_size; ?>px;
                -o-background-size: <?php echo $preloader_size; ?>px <?php echo $preloader_size; ?>px;
                -webkit-background-size: <?php echo $preloader_size; ?>px <?php echo $preloader_size; ?>px;
            }
        </style>

        <noscript>
            <style type="text/css">
                #preloader,
                #preloader-background,
                #preloader-status {
                    display: none !important;
                }
            </style>
        </noscript>
    <?php
}
add_action( 'wp_head' , BESTPL_PREFIX . '_css_options' );

/**
 * Add DIV container with preloader to footer.
 *
 * @since 4.1
 */
function bestpreloader_add_container() {
    ?>
        <div id="preloader">
            <div id="preloader-background"></div>
            <div id="preloader-status"></div>
        </div>
    <?php
}
add_action( 'wp_head', BESTPL_PREFIX . '_add_container', 1000 );
