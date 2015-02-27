<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); //==========================?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

		<?php rfuel_get_archive_content(); ?>

	</article> <!-- end article -->

	<?php endwhile; else : //===============================================================?>

	<article id="post-not-found" class="hentry">

		<header class="article-header">
			<h1>Oops, No Posts Were Found!</h1>
		</header>

		<section class="entry-content">
			<p>Uh Oh. Something is missing. Try double checking things.</p>
			<p><?php get_search_form(); ?></p>
		</section>

	</article>

	<?php endif; //=========================================================================?>

<?php get_footer(); ?>