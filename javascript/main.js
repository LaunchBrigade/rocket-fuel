/*===================================================
 Warning: Must be loaded at end of HTML document.
 ==================================================*/

/**
 * Smoothly animates internal page links.
 * @return {null}
 */
jQuery('a[href*=#]:not([href=#])').click(function(event) {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		var target = jQuery(this.hash);
		target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			jQuery('html,body').animate({
				scrollTop: target.offset().top
			}, 400);
			event.preventDefault();
		}
	}
});
