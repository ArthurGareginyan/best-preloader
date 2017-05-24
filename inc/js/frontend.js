/*
 * Plugin JavaScript and JQuery code for the front end of website
 *
 * @package     Best Preloader
 * @uthor       Arthur Gareginyan
 * @link        http://www.arthurgareginyan.com
 * @copyright   Copyright (c) 2016-2017 Arthur Gareginyan. All Rights Reserved.
 * @since       4.1
 */


// Set variables
var seconds = parseInt( bestpreloader_scriptParams["seconds"] );
var preloader = jQuery('#preloader');
var loaded = false;

// Wait before preloader will appear
wait = setTimeout(displayPreloader, (seconds * 1000) );

// Display the preloader
function displayPreloader() {
    if ( loaded != true ) {
        preloader.show();
    }
}

// Makes sure the whole site is loaded
jQuery(window).load(function() {

    // Change variable
    loaded = true;

    // Fade out the loading animation and the white DIV that covers the website
    preloader.delay(500).fadeOut("slow");

});
