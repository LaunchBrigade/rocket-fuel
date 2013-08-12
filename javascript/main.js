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
