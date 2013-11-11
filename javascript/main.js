/**
 * Warning: Must be included at end of HTML document.
 */

/**
 * On SVG error, load PNG fallback
 * @return {null}
 */
jQuery('img').error(function() {
	var src = jQuery(this).attr('src');
	if ( src.search('.svg') != -1 ) {
		src = src.replace('.svg', '.png');
		jQuery(this).attr('src', src);
	}
});

/**
 * Smoothly animated back-to-top
 * @return {null}
 */
jQuery("a[href='#top']").click( function( event ) {
	event.preventDefault();
	jQuery("html, body").animate({ scrollTop: 0 }, 400);
});
