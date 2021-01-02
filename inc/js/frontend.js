/*
 * WordPress plugin Best Preloader by Space X-Chimp ( https://www.spacexchimp.com ).
 *
 * @package     Best Preloader
 * @author      Arthur Gareginyan
 * @link        https://www.spacexchimp.com
 * @copyright   Copyright (c) 2016-2021 Space X-Chimp. All Rights Reserved.
 */


// Set variables
var seconds = parseInt( spacexchimp_p007_scriptParams["seconds"] );
var preloader = jQuery('#preloader');
var loaded = false;

// Wait before preloader will appear
wait = setTimeout( displayPreloader, ( seconds * 1000 ) );

// Display the preloader
function displayPreloader() {
    if ( loaded != true ) {
        preloader.show();
    }
}

// Makes sure that the whole website is loaded
jQuery(window).load(function() {

    // Change variable
    loaded = true;

    // Fade out the loading animation and the white DIV that covers the website
    preloader.delay(500).fadeOut("slow");

});
