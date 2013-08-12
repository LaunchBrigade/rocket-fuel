<?php get_header(); ?>

			<main id="main">
				
				<?php do_action('rfuel_content_before'); ?>

				<div class="content">

					<?php if (is_category()) { ?>
						<h1 class="archive-title h2">
							<span>Posts Categorized:</span> <?php single_cat_title(); ?>
						</h1>

					<?php } elseif (is_tag()) { ?>
						<h1 class="archive-title h2">
							<span>Posts Tagged:</span> <?php single_tag_title(); ?>
						</h1>

					<?php } elseif (is_author()) {
						global $post;
						$author_id = $post->post_author;
					?>
						<h1 class="archive-title h2">

							<span>Posts By:</span> <?php the_author_meta('display_name', $author_id); ?>

						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive-title h2">
							<span>Daily Archives:</span> <?php the_time('l, F j, Y'); ?>
						</h1>

					<?php } elseif (is_month()) { ?>
							<h1 class="archive-title h2">
								<span>Monthly Archives:</span> <?php the_time('F Y'); ?>
							</h1>

					<?php } elseif (is_year()) { ?>
							<h1 class="archive-title h2">
								<span>Yearly Archives:</span> <?php the_time('Y'); ?>
							</h1>
					<?php } ?>

					<?php do_action('rfuel_loop_before'); ?>

					<?php do_action('rfuel_loop'); ?>

					<?php do_action('rfuel_loop_after'); ?>

				</div><!-- /.content -->

				<?php do_action('rfuel_content_after'); ?>

			</main><!-- /#main -->

<?php get_footer(); ?>