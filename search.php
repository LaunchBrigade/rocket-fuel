<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); //==========================?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?> role="article">

		<?php rfuel_get_archive_content(); ?>

	</article> <!-- end article -->

	<?php endwhile; else : //===============================================================?>

	<article id="post-not-found" class="article hentry">

		<header class="article_header">
			<h1>Oops, No Posts Were Found!</h1>
		</header>

		<section class="article_entry-content">
			<p>Uh Oh. Something is missing. Try double checking things.</p>
			<p><?php get_search_form(); ?></p>
		</section>

	</article>

	<?php endif; //=========================================================================?>

<?php get_footer(); ?>