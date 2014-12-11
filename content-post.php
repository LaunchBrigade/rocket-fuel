<header class="article_header">

	<h3 class="article_title">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	</h3>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="article_featured-image">
		<?php the_post_thumbnail(); ?>
	</div>
	<?php endif; ?>

</header> <!-- end article header -->

<section class="article_entry-content">
	<?php the_excerpt(); ?>
</section> <!-- end article section -->

<footer class="article_footer">
	<p class="article_more"><a href="<?php the_permalink(); ?>">Read More</a></p>
	<p class="article_meta">
		By: <?php the_author_posts_link(); ?>
		 | <?php the_date(); ?>
		 | <?php the_category( ', ' ); ?>
		<?php if ( comments_open() ) : ?> | <a href="<?php the_permalink(); ?>#comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></a><?php endif; ?>
	</p>
</footer> <!-- end article footer -->
