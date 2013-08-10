<?php get_header(); ?>

			<!--
				Template: page.php
			-->

			<main id="main">
				
				<?php do_action('rfuel_content_before'); ?>

				<div class="content">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

						<header class="article-header">

							<h1 class="page-title"><?php the_title(); ?></h1>

						</header> <!-- end article header -->

						<section class="entry-content">
							<?php the_content(); ?>
						</section> <!-- end article section -->

						<footer class="article-footer">
							<?php comments_template(); ?>
						</footer> <!-- end article footer -->

					</article> <!-- end article -->

					<?php endwhile; ?>

					<?php else : ?>

					<article id="post-not-found" class="hentry">

						<header class="article-header">
							<h1><?php echo "Oops, Page Not Found!"; ?></h1>
						</header>

						<section class="entry-content">
							<p><?php echo "Uh Oh. Something is missing. Try double checking things."; ?></p>
						</section>

					</article>

					<?php endif; ?>

				</div><!-- /.content -->

				<?php do_action('rfuel_content_after'); ?>

			</main><!-- /#main -->

<?php get_footer(); ?>