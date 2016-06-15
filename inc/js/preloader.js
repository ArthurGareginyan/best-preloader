/*
 * Best Preloader
 * @since 2.1
 * @agareginyan
 * GPL v3 Licensed
 */


// Set variables
var seconds = parseInt( scriptParams["seconds"] );
var preloader = jQuery('#preloader');
var loaded = false;

// Wait before preloader will appear
wait = setTimeout(displayPreloader, (seconds * 1000) );

// Display the preloader
function displayPreloader() {
    if (loaded != true) {
        preloader.show();
    }
}

// Makes sure the whole site is loaded
jQuery(window).load(function() {

    // Change variable
    loaded = true;

    // Fade out the loading animation and the white DIV that covers the website.
    preloader.delay(500).fadeOut("slow");

});