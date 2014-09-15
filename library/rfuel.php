<?php

$dir_path = trailingslashit( get_template_directory() ) . 'library/';

// Sidebar Registration
require_once( $dir_path . 'sidebars.php' );

// Plugin Activation
require_once( $dir_path . 'plugin-activation/tgm-plugin-activation/auto-install.php' );

/**
 * Get content template for archive based on post-type.
 * @global $post
 * @return void
 */
function rfuel_get_archive_content() {
	$post_type = get_post_type();
	get_template_part( 'content', $post_type );
}
