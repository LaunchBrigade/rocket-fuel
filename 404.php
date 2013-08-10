<?php get_header(); ?>

			<!--
				Template: 404.php
			-->

			<section class="main">
				
				<?php do_action('rfuel_content_before'); ?>

				<div class="content">

					<article id="post-not-found" class="hentry">
							<header class="article-header">
								<h1>404 - Article Not Found.</h1>
						</header>
							<section class="entry-content">
								<p>The article you were looking for was not found, but maybe try looking again!</p>
								<p><?php get_search_form(); ?></p>
						</section>
					</article>

				</div><!-- /.content -->

				<?php do_action('rfuel_content_after'); ?>

			</section><!-- /.main -->

<?php get_footer(); ?>