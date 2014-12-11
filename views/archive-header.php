<?php if (is_category()) { ?>
	<h1 class="archive-title archive-title--category">
		<span>Posts Categorized:</span> <?php single_cat_title(); ?>
	</h1>

<?php } elseif (is_tag()) { ?>
	<h1 class="archive-title archive-title--tag">
		<span>Posts Tagged:</span> <?php single_tag_title(); ?>
	</h1>

<?php } elseif (is_author()) {
	global $post;
	$author_id = $post->post_author;
?>
	<h1 class="archive-title archive-title--author">
		<span>Posts By:</span> <?php the_author_meta('display_name', $author_id); ?>
	</h1>
	
<?php } elseif (is_day()) { ?>
	<h1 class="archive-title archive-title--day">
		<span>Daily Archives:</span> <?php the_time('l, F j, Y'); ?>
	</h1>

<?php } elseif (is_month()) { ?>
		<h1 class="archive-title archive-title--month">
			<span>Monthly Archives:</span> <?php the_time('F Y'); ?>
		</h1>

<?php } elseif (is_year()) { ?>
		<h1 class="archive-title archive-title--year">
			<span>Yearly Archives:</span> <?php the_time('Y'); ?>
		</h1>
<?php } ?>