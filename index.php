<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); //==========================?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

		<?php rfuel_get_archive_content(); ?>

	</article> <!-- end article -->

	<?php endwhile; else : //===============================================================?>

	<article id="post-not-found" class="hentry">

		<header class="article-header">
			<h1><?php echo "Oops, No Posts Were Found!"; ?></h1>
		</header>

		<section class="entry-content">
			<p><?php echo "Uh Oh. Something is missing. Try double checking things."; ?></p>
		</section>

	</article>

	<?php endif; //=========================================================================?>

<?php get_footer(); ?>
