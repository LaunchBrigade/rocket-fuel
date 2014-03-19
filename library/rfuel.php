<?php

/**
 * Get content template for archive based on post-type.
 * @global $post
 * @return void
 */
function get_archive_content() {
	$post_type = get_post_type();
	get_template_part( 'content', $post_type );
}