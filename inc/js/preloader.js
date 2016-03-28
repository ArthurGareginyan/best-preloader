/*
 Best Preloader v1.0 | @agareginyan | GPL v3 Licensed
 */


jQuery(window).load(function() {

	jQuery('#preloader').delay(500).fadeOut("slow");
	
	setTimeout(remove_mypreloader, 3000);
	function remove_mypreloader() {
		jQuery('#preloader').remove();
	}

});