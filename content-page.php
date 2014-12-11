<header class="article_header">

	<h3 class="article_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

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
</footer> <!-- end article footer -->