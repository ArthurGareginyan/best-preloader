/*
 * Plugin JavaScript and jQuery code for the admin pages of website
 *
 * @package     Best Preloader
 * @uthor       Arthur Gareginyan
 * @link        https://www.arthurgareginyan.com
 * @copyright   Copyright (c) 2016-2017 Arthur Gareginyan. All Rights Reserved.
 * @since       4.6
 */


jQuery(document).ready(function($) {

    "use strict";

    // Color picker
    $('.color-picker').wpColorPicker();

    // Remove the 'successful' message after 3 seconds
    if ('.updated') {
        setTimeout(function() {
            $('.updated').fadeOut();
        }, 3000);
    }

    // Enable Bootstrap Checkboxes
    $(':checkbox').checkboxpicker();

    // Add dynamic content to page tabs. Needed for having an up to date content.
    $('.include-tab-author').load('https://www.spacexchimp.com/assets/dynamic-content/plugins.html #include-tab-author');
    $('.include-tab-store').load('https://www.spacexchimp.com/assets/dynamic-content/plugins.html #include-tab-store');

    // Add questions and answers into spoilers and color them in different colors
    $('.panel-group .panel').each(function(i) {
         $('.question-' + (i+1) ).appendTo( $('h4', this) );
         $('.answer-' + (i+1) ).appendTo( $('.panel-body', this) );

         if ( $(this).find('h4 div').hasClass('question-red') ) {
             $(this).addClass('panel-danger');
         } else {
             $(this).addClass('panel-info');
         }
    });

    // Get values for variables
    var plugin_url = bestpreloader_scriptParams["plugin_url"];

    // Live preview
    $('.custom-image').change(function() {
        var val = $(this).val();
        var def_val = plugin_url + 'inc/img/preloader.gif';
        if (val) {
            $('#preview #preloader img').attr('src',val);
        } else {
            $('#preview #preloader img').attr('src',def_val);
        }

    });

    $('.preloader-size').change(function() {
        var val = $(this).val();
        $('#preview #preloader img').attr('width',val);
        $('#preview #preloader img').attr('height',val);
    });

    $('.background-color').wpColorPicker({
        change: function (event, ui) {
            var element = event.target;
            var color = ui.color.toString();
            $('#preview #preloader-background').css('background-color',color);
        },
        clear: function (event) {
            var element = $(event.target).siblings('.wp-color-picker')[0];
            var color = '';
            if (element) {
                $('#preview #preloader-background').css('background-color',color);
            }
        }
    });

});
