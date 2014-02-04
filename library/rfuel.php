<?php


function get_archive_content() {
	$post_type = get_post_type();
	get_template_part( 'content', $post_type );
}