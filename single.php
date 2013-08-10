<?php get_header(); ?>

			<!--
				Template: single.php
			-->

			<section class="main">
				
				<?php do_action('rfuel_content_before'); ?>

				<div class="content">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

						<header class="article-header">

							<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							<p class="byline vcard"><?php
								printf( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), the_author(), get_the_category_list(', '));
							?></p>

						</header> <!-- end article header -->

						<section class="entry-content">
							<?php the_content(); ?>
						</section> <!-- end article section -->

						<footer class="article-footer">
							<p class="tags"><?php the_tags('<span class="tags-title">' . 'Tags:' . '</span> ', ', ', ''); ?></p>
						</footer> <!-- end article footer -->

						<?php comments_template(); ?>

					</article> <!-- end article -->

					<?php endwhile; ?>

					<?php else : ?>

					<article id="post-not-found" class="hentry">
							<header class="article-header">
								<h1><?php echo "Oops, Post Not Found!"; ?></h1>
						</header>
							<section class="entry-content">
								<p><?php echo "Uh Oh. Something is missing. Try double checking things."; ?></p>
						</section>
						<footer class="article-footer">
								<p><?php echo "This is the error message in the index.php template."; ?></p>
						</footer>
					</article>

					<?php endif; ?>

				</div><!-- /.content -->

				<?php do_action('rfuel_content_after'); ?>

			</section><!-- /.main -->

<?php get_footer(); ?>