<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); //==========================?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

		<?php get_archive_content(); ?>

	</article> <!-- end article -->

	<?php endwhile; else : //===============================================================?>

	<article id="post-not-found" class="hentry">

		<header class="article-header">
			<h1>No Results Were Found!</h1>
		</header>

		<section class="entry-content">
			<p>Couldn't find what you were looking for? Try double checking your search or entering something else.</p>
			<p><?php get_search_form(); ?></p>
		</section>

	</article>

	<?php endif; //=========================================================================?>

<?php get_footer(); ?>