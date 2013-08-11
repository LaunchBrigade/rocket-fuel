<?php
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
	add_theme_support( 'automatic-feed-links' );

	// Scripts and styles
	add_action( 'wp_enqueue_scripts', 'rfuel_enqueue_scripts' );

	// Menus
	add_action( 'init', 'register_menu_primary' );

	// Widget Areas
	add_action( 'widgets_init', 'register_sidebar_primary' );
	add_action( 'widgets_init', 'register_sidebar_subsidiary' );

	// Head Actions
	add_action( "{$prefix}_head_meta", 'template_part_meta' );

	// Header Actions
	add_action( "{$prefix}_header", 'template_part_logo' );
	add_action( "{$prefix}_header", 'get_menu_primary' );

	// Content Actions
	add_action( "{$prefix}_content_after", 'get_sidebar_primary');
	add_action( "{$prefix}_loop", 'template_part_loop' );
	add_action( "{$prefix}_loop_after", 'template_part_pagination' );

	// Footer Actions
	add_action( "{$prefix}_footer", 'get_sidebar_subsidiary');
	add_action( "{$prefix}_footer", 'template_part_footer_bottom');
}

/**
 * Get template head-meta.php
 * @return null
 */
function template_part_meta() {
	get_template_part('views/head', 'meta');
}

/**
 * Register primary menu
 * @return null
 */
function register_menu_primary() {
	register_nav_menu( 'primary', 'Primary' );
}

/**
 * Get primary menu
 * @return null
 */
function get_menu_primary() {
	wp_nav_menu( array(
		'theme_location'  => 'primary'
	));
}

/**
 * Register widget-area primary
 * @return null
 */
function register_sidebar_primary() {
	register_sidebar(array(
		'name'          => 'Primary',
		'id'            => 'primary',
		'description'   => 'Main widget-area aside content.',
		'class'         => 'aside widgets',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));
}

/**
 * Register widget-area subsidiary
 * @return null
 */
function register_sidebar_subsidiary() {
	register_sidebar(array(
		'name'          => 'Subsidiary',
		'id'            => 'subsidiary',
		'description'   => 'Footer widget-area content.',
		'class'         => 'subsidiary widgets',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));
}

/**
 * Get the primary sidebar if active (sidebar-primary)
 * @return null
 */
function get_sidebar_primary() {
	if ( is_active_sidebar( 'primary' ) ) {
		get_sidebar( 'primary' );
	}
}

/**
 * Get the subsidiary sidebar if active (sidebar-subsidiary)
 * @return null
 */
function get_sidebar_subsidiary() {
	if ( is_active_sidebar( 'subsidiary' ) ) {
		get_sidebar( 'subsidiary' );
	}
}

/**
 * Get the template header-logo.php
 * @return null
 */
function template_part_logo() {
	get_template_part('views/header', 'logo');
}

/**
 * Get the template loop.php
 * @return null
 */
function template_part_loop() {
	get_template_part( 'views/loop' );
}

/**
 * Get the template content-pagination.php if active
 * @return null
 */
function template_part_pagination() {
	if ( get_previous_posts_link() or get_next_posts_link() ) {
		get_template_part( 'views/content', 'pagination' );
	}
}

/**
 * Get the template footer-bottom.php
 * @return null
 */
function template_part_footer_bottom() {
	get_template_part( 'views/footer', 'bottom' );
}

/**
 * Enqueue scripts and styles.
 * @return null
 */
function rfuel_enqueue_scripts() {
	wp_enqueue_script( 'rfuel-main', get_stylesheet_directory_uri().'/javascript/main.js', array( 'jquery' ), '1.0', true );
}