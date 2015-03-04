<?php
/**
 * Rocket Fuel
 * - Sidebar
 * - Custom Walkers
 */
require_once( trailingslashit( get_template_directory() ) . 'library/class-rfuel.php' );
$theme = new RFuel();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', array( $theme, 'setup' ) );

function rfuel_get_navbar_menu() {
	global $theme;

	return $theme->get_navbar_menu();
}

function rfuel_get_archive_content() {
	global $theme;

	return $theme->get_archive_content();
}
