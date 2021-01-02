/*
 * Plugin JavaScript and jQuery code for the admin pages of website
 *
 * @package     Best Preloader
 * @author      Arthur Gareginyan
 * @link        https://www.spacexchimp.com
 * @copyright   Copyright (c) 2016-2021 Space X-Chimp. All Rights Reserved.
 */


jQuery(document).ready(function($) {

    "use strict";

    // Remove the 'successful' message after 3 seconds
    if ('.updated') {
        setTimeout(function() {
            $('.updated').fadeOut();
        }, 3000);
    }

    // Add a dynamic content to the plugin settings page. Needed for having an up to date banners
    $('.include-tab-store').load('https://resources.spacexchimp.com/wordpress/plugins/dynamic-content/page.html');

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

    // Enable color picker
    $('.control-color').wpColorPicker();

    // Enable switches
    $('.control-switch').checkboxpicker();

    // Enable number fields
    $('.control-number .btn-danger').on('click', function(){
        var input = $(this).parent().siblings('input');
        var value = parseInt(input.val());
        input.val(value - 1);
        input.change();
    });
    $('.control-number .btn-success').on('click', function(){
        var input = $(this).parent().siblings('input');
        var value = parseInt(input.val());
        input.val(value + 1);
        input.change();
    });

    // Live preview
    var plugin_url = spacexchimp_p007_scriptParams["plugin_url"];
    $('.custom-image').change(function() {
        var val = $(this).val();
        var def_val = plugin_url + 'inc/img/preloader.gif';
        if (val) {
            $('#preview #preloader img').attr('src',val);
        } else {
            $('#preview #preloader img').attr('src',def_val);
        }
    });
    $('.preloader-size input').change(function() {
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
