/*===================================================
 Warning: Must be loaded at end of HTML document.
 ==================================================*/
var Test = require('./test');

/**
 * Smoothly animates internal page links.
 * @return {null}
 */
$('a[href*=#]:not([href=#])').click(function(event) {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			$('html,body').animate({
				scrollTop: target.offset().top
			}, 400);
			event.preventDefault();
		}
	}
});

/**
 * Main Javascript file for the theme
 */

$(document).foundation({
	topbar: {
		sticky_class: 'sticky-nav',
		mobile_show_parent_link: true
	}
});

// Browserify test
var test = new Test();
test.getMsg();
