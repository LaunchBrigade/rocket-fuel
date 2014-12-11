<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); //==========================?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?> role="article">

		<header class="article_header">

			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

			<?php if ( has_post_thumbnail() ) : ?>

			<div class="article_featured-image">

				<?php the_post_thumbnail(); ?>

			</div>
			
			<?php endif; ?>
			
			<p class="article_meta">
				By: <?php the_author_posts_link(); ?> | 
				<?php the_date(); ?> | 
				<?php the_category( ', ' ); ?>
			</p>

		</header> <!-- end article header -->

		<section class="article_entry-content">

			<?php the_content(); ?>
			
			<?php if ( has_tag() ) : ?>

			<p class="tags"><?php the_tags('<span class="tags-title">' . 'Tagged on:' . '</span> ', ', ', ''); ?></p>

			<?php endif; ?>

		</section> <!-- end article section -->

		<footer class="article-footer">

			<?php comments_template(); ?>

		</footer> <!-- end article footer -->

	</article> <!-- end article -->

	<?php endwhile; else : //===============================================================?>

	<article id="post-not-found" class="article hentry">

		<header class="article_header">

			<h1><?php echo "Oops, No Post Was Found!"; ?></h1>

		</header>

		<section class="article_entry-content">

			<p><?php echo "Uh Oh. Something is missing. Try double checking things."; ?></p>

		</section>

	</article>

	<?php endif; //=========================================================================?>

<?php get_footer(); ?>
