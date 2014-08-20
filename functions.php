<?php
/**
 * Rocket Fuel Library Functions
 * - Sidebar
 * - TGM Plugin Activation
 */
require_once( trailingslashit( get_template_directory() ) . 'library/rfuel.php' );

/**
 * Theme Setup
 */

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'rfuel_theme_setup' );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 */
function rfuel_theme_setup() {
	// Prefix added to do_action hooks
	$prefix = 'rfuel';

	// Theme support
	add_theme_support( 'html5' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	// Scripts and styles
	add_action( 'wp_enqueue_scripts', 'rfuel_enqueue_scripts' );

	// Menus
	add_action( 'init', 'rfuel_register_menu_primary' );

	// Widget Areas
	add_action( 'widgets_init', 'rfuel_register_sidebar_primary' );
	add_action( 'widgets_init', 'rfuel_register_sidebar_subsidiary' );

	// Head Actions
	add_action( "{$prefix}_html", 'rfuel_get_html_tag' );
	add_action( "{$prefix}_head_meta", 'rfuel_get_meta' );

	// Header Actions
	add_action( "{$prefix}_header", 'rfuel_get_logo' );
	add_action( "{$prefix}_header", 'rfuel_get_menu_primary' );

	// Content Actions
	add_action( "{$prefix}_loop_before", 'rfuel_get_archive_header' );
	add_action( "{$prefix}_loop_after", 'rfuel_get_pagination' );
	add_action( "{$prefix}_content_after", 'rfuel_get_sidebar_primary');

	// Footer Actions
	add_action( "{$prefix}_footer", 'rfuel_get_sidebar_subsidiary');
	add_action( "{$prefix}_footer", 'rfuel_get_footer_bottom');
}

/**
 * Get template html.php
 * @return null
 */
function rfuel_get_html_tag() {
	get_template_part('views/html');
}

/**
 * Get template head-meta.php
 * @return null
 */
function rfuel_get_meta() {
	get_template_part('views/head', 'meta');
}

/**
 * Register primary menu
 * @return null
 */
function rfuel_register_menu_primary() {
	register_nav_menu( 'primary', 'Primary' );
}

/**
 * Get primary menu
 * @return null
 */
function rfuel_get_menu_primary() {
	wp_nav_menu( array(
		'theme_location'  => 'primary',
		'container'       => 'nav',
		'container_class' => 'main-nav',
		'container_id'    => 'primary-menu',
	));
}

/**
 * Get the primary sidebar if active (sidebar-primary)
 * @return null
 */
function rfuel_get_sidebar_primary() {
	if ( is_active_sidebar( 'primary' ) ) {
		get_sidebar( 'primary' );
	}
}

/**
 * Get the subsidiary sidebar if active (sidebar-subsidiary)
 * @return null
 */
function rfuel_get_sidebar_subsidiary() {
	if ( is_active_sidebar( 'subsidiary' ) ) {
		get_sidebar( 'subsidiary' );
	}
}

/**
 * Get the template archive-header.php
 * @return null
 */
function rfuel_get_archive_header() {
	if ( is_archive() ) {
		get_template_part('views/archive', 'header');
	}
}

/**
 * Get the template header-logo.php
 * @return null
 */
function rfuel_get_logo() {
	get_template_part('views/header', 'logo');
}

/**
 * Get the template content-pagination.php if active
 * @return null
 */
function rfuel_get_pagination() {
	if ( get_previous_posts_link() or get_next_posts_link() ) {
		get_template_part( 'views/loop', 'pagination' );
	}
}

/**
 * Get the template footer-bottom.php
 * @return null
 */
function rfuel_get_footer_bottom() {
	get_template_part( 'views/footer', 'bottom' );
}

/**
 * Enqueue scripts and styles.
 * @return null
 */
function rfuel_enqueue_scripts() {
	wp_enqueue_script( 'rfuel-main', get_template_directory_uri().'/javascript/main.js', array( 'jquery' ), '1.0', true );
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}