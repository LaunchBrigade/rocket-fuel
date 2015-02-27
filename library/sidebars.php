<?php
/**
 * Register widget-area primary
 * @return null
 */
function rfuel_register_sidebar_primary() {
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
function rfuel_register_sidebar_subsidiary() {
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
