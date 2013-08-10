<?php
/**
 * Custom functions (eventually to be put in library)
 */

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
	$prefix = 'rfuel';

	add_action( 'widgets_init', 'register_theme_sidebars' );

	// Head meta
	add_action( "{$prefix}_head_meta", 'template_part_meta' );

	// Primary sidebar
	add_action( "{$prefix}_content_after", 'template_part_sidebar_primary');

	// Copyright
	add_action( "{$prefix}_footer", 'template_part_sidebar_subsidiary');
	add_action( "{$prefix}_footer", 'template_part_footer_bottom');
}

function template_part_meta() {
	get_template_part('views/head', 'meta');
}

function template_part_footer_bottom() {
	get_template_part( 'views/footer', 'bottom' );
}

function register_theme_sidebars() {
	// Primary
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

	// Subsidiary
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

function template_part_sidebar_primary() {
	get_sidebar('primary');
}

function template_part_sidebar_subsidiary() {
	get_sidebar('subsidiary');
}