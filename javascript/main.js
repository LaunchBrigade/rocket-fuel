/*===================================================
 Warning: Must be loaded at end of HTML document.
 ==================================================*/

/**
 * Smoothly animated back-to-top
 * @return {null}
 */
jQuery("a[href='#top']").click( function( event ) {
	event.preventDefault();
	jQuery("html, body").animate({ scrollTop: 0 }, 400);
});
