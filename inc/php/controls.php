<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Generator of the help text under options
 */
function spacexchimp_p007_control_help( $help=null ) {

    // Return if help text not defined
    if ( empty( $help ) ) {
        return;
    }

    // Generate a part of table
    $out = "<tr>
                <td></td>
                <td class='help-text'>
                    $help
                </td>
            </tr>";

    // Print the generated part of table
    echo $out;
}

/**
 * Generator of the field option for saving plugin settings to database
 */
function spacexchimp_p007_control_field( $name, $label, $help=null, $placeholder=null ) {

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P007_SETTINGS . '_settings' );
    $value = !empty( $options[$name] ) ? esc_textarea( $options[$name] ) : '';

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    <input
                        type='text'
                        name='" . SPACEXCHIMP_P007_SETTINGS . "_settings[$name]'
                        id='" . SPACEXCHIMP_P007_SETTINGS . "_settings[$name]'
                        value='$value'
                        placeholder='$placeholder'
                        class='control-field $name'
                    >
                </td>
            </tr>";

    // Print the generated part of table
    echo $out;

    // Print a help text
    spacexchimp_p007_control_help( $help );
}

/**
 * Generator of the switch option for saving plugin settings to database
 */
function spacexchimp_p007_control_switch( $name, $label, $help=null ) {

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P007_SETTINGS . '_settings' );
    $checked = !empty( $options[$name] ) ? "checked='checked'" : '';

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    <input
                        type='checkbox'
                        name='" . SPACEXCHIMP_P007_SETTINGS . "_settings[$name]'
                        id='" . SPACEXCHIMP_P007_SETTINGS . "_settings[$name]'
                        $checked
                        class='control-switch $name'
                    >
                </td>
            </tr>";

    // Print the generated part of table
    echo $out;

    // Print a help text
    spacexchimp_p007_control_help( $help );
}

/**
 * Generator of the number option for saving plugin settings to database
 */
function spacexchimp_p007_control_number( $name, $label, $help=null, $default=null ) {

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P007_SETTINGS . '_settings' );
    $value = !empty( $options[$name] ) ? esc_attr( $options[$name] ) : $default;

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                        <div class='input-group control-number $name'>
                            <span class='input-group-btn'>
                                <button type='button' class='btn btn-danger' data-type='minus' data-field='example'>
                                    <i class='fa fa-minus' aria-hidden='true'></i>
                                </button>
                            </span>
                            <input
                                type='number'
                                name='" . SPACEXCHIMP_P007_SETTINGS . "_settings[$name]'
                                id='" . SPACEXCHIMP_P007_SETTINGS . "_settings[$name]'
                                value='$value'
                                maxlength='4'
                                class='form-control text-center'
                            >
                            <span class='input-group-btn'>
                                <button type='button' class='btn btn-success' data-type='plus' data-field='example'>
                                    <i class='fa fa-plus' aria-hidden='true'></i>
                                </button>
                            </span>
                        </div>
                </td>
            </tr>";

    // Print the generated part of table
    echo $out;

    // Print a help text
    spacexchimp_p007_control_help( $help );
}

/**
 * Generator of the color option for saving plugin settings to database
 */
function spacexchimp_p007_control_color( $name, $label, $help=null, $default=null ) {

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P007_SETTINGS . '_settings' );
    $value = !empty( $options[$name] ) ? esc_attr( $options[$name] ) : $default;

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    <input
                        type='text'
                        name='" . SPACEXCHIMP_P007_SETTINGS . "_settings[$name]'
                        id='" . SPACEXCHIMP_P007_SETTINGS . "_settings[$name]'
                        value='$value'
                        placeholder='$default'
                        class='control-color $name'
                    >
                </td>
            </tr>";

    // Print the generated part of table
    echo $out;

    // Print a help text
    spacexchimp_p007_control_help( $help );
}

/**
 * Generator of the choice option for saving plugin settings to database
 */
function spacexchimp_p007_control_choice( $name, $items, $label, $help, $default ) {

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P007_SETTINGS . '_settings' );
    $option = !empty( $options[$name] ) ? $options[$name] : '';
    $list_item = '';

    foreach ( $items as $item_key => $item_value ) {
        if ( empty( $option ) AND $item_key == $default ) {
            $selected = "checked='checked'";
        } elseif ( $option == $item_key ) {
            $selected = "checked='checked'";
        } else {
            $selected = "";
        }
        $list_item .= "<li>
                           <input
                                  type='radio'
                                  name='" . SPACEXCHIMP_P007_SETTINGS . "_settings[$name]'
                                  value='$item_key'
                                  $selected
                           >
                            $item_value
                       <li>";
    }

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    <ul class='control-list $name'>
                        $list_item
                    </ul>
                </td>
            </tr>";

    // Print the generated part of table
    echo $out;

    // Print a help text
    spacexchimp_p007_control_help( $help );
}
