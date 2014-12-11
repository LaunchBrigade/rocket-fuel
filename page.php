<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); //==========================?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?> role="article">

		<header class="article_header">

			<?php if ( !is_front_page() ) : ?>

			<h1 class="page_title"><?php the_title(); ?></h1>
			
			<?php endif; ?>
			
			<?php if ( has_post_thumbnail() ) : ?>

			<div class="article_featured-image">

				<?php the_post_thumbnail(); ?>

			</div>

			<?php endif; ?>

		</header> <!-- end article header -->
		

		<section class="article_entry-content">

			<?php the_content(); ?>

		</section> <!-- end article section -->

		<footer class="article_footer">

			<?php comments_template(); ?>

		</footer> <!-- end article footer -->

	</article> <!-- end article -->

	<?php endwhile; else : //===============================================================?>

	<article id="post-not-found" class="article hentry">

		<header class="article_header">

			<h1><?php echo "Oops, No Page Was Found!"; ?></h1>

		</header>

		<section class="article_entry-content">

			<p><?php echo "Uh Oh. Something is missing. Try double checking things."; ?></p>

		</section>

	</article>

	<?php endif; //=========================================================================?>

<?php get_footer(); ?>