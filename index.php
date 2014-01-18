<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); //==========================?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

		<header class="article-header">

			<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

			<?php if ( has_post_thumbnail() ) : ?>
			<div class="featured-image">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php endif; ?>

		</header> <!-- end article header -->

		<section class="entry-content">
			<?php the_excerpt(); ?>
		</section> <!-- end article section -->
		
		<footer class="article-footer">
			<p class="meta">
				By: <?php the_author_posts_link(); ?> | 
				<?php the_date(); ?> | 
				<?php the_category( ', ' ); ?>  | 
				<a href="<?php the_permalink(); ?>#comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></a> 
				<a href="<?php the_permalink(); ?>">Read More</a>
			</p>
		</footer> <!-- end article footer -->

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