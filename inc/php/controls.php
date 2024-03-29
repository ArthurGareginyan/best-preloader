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

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p007_options();
    $option = $options[$name];

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    <input
                        type='text'
                        name='" . $plugin['settings'] . "_settings[$name]'
                        id='" . $plugin['settings'] . "_settings[$name]'
                        value='$option'
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
 * Generator of the number option for saving plugin settings to database
 */
function spacexchimp_p007_control_number( $name, $label, $help=null ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p007_options();
    $option = $options[$name];

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
                                name='" . $plugin['settings'] . "_settings[$name]'
                                id='" . $plugin['settings'] . "_settings[$name]'
                                value='$option'
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
function spacexchimp_p007_control_color( $name, $label, $help=null ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p007_options();
    $option = $options[$name];

    // Generate a part of table
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    <input
                        type='text'
                        name='" . $plugin['settings'] . "_settings[$name]'
                        id='" . $plugin['settings'] . "_settings[$name]'
                        value='$option'
                        placeholder='$option'
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

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p007_options();
    $option = $options[$name];

    // Loop of elements
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
                            <div>
                                <input
                                    type='radio'
                                    id='" . $plugin['settings'] . "_settings[$name]-$item_key'
                                    name='" . $plugin['settings'] . "_settings[$name]'
                                    value='$item_key'
                                    $selected
                                >
                               <label for='" . $plugin['settings'] . "_settings[$name]-$item_key'>
                                    $item_value
                               </label>
                            </div>
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

/**
 * Generator of the hidden option for saving plugin settings to database
 */
function spacexchimp_p007_control_hidden( $name, $value ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p007_plugin();

    // Generate a part of table
    $out = "<input
                type='hidden'
                name='" . $plugin['settings'] . "_settings[$name]'
                id='" . $plugin['settings'] . "_settings[$name]'
                value='$value'
                class='control-hidden $name'
            >";

    // Print the generated part of table
    echo $out;
}

/**
 * Generator of the separator between option groups
 */
function spacexchimp_p007_control_separator( $text=null ) {

    // Generate a part of table
    if ( ! empty( $text ) ) {
        $out = "<tr>
                    <td height='60' colspan='2'>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' style='text-align:center;'>
                    " . $text . "
                    </td>
                </tr>";
    } else {
        $out = "<tr>
                    <td height='60' colspan='2'>
                        <hr>
                    </td>
                </tr>";
    }

    // Print the generated part of table
    echo $out;
}
