<header class="article-header">

	<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

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
	<p class="read-more"><a href="<?php the_permalink(); ?>">Read More</a></p>
	<p class="meta">
		By: <?php the_author_posts_link(); ?>
		 | <?php the_date(); ?>
		 | <?php the_category( ', ' ); ?>
		<?php if ( comments_open() ) : ?> | <a href="<?php the_permalink(); ?>#comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></a><?php endif; ?>
	</p>
</footer> <!-- end article footer -->
