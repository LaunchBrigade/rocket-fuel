<?php get_header(); ?>

			<main id="main">
				
				<?php do_action('rfuel_content_before'); ?>

				<div class="content">

					<?php do_action('rfuel_loop_before'); ?>

					<?php do_action('rfuel_loop'); ?>

					<?php do_action('rfuel_loop_after'); ?>

				</div><!-- /.content -->

				<?php do_action('rfuel_content_after'); ?>

			</main><!-- /#main -->

<?php get_footer(); ?>