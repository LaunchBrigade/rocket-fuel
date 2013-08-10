<?php if ( get_previous_posts_link() or get_next_posts_link() ) : ?>
<!-- Pagination -->
<div class="pagination">
	<span class="next"><?php next_posts_link( 'Older posts' ); ?></span>
	<span class="previous"><?php previous_posts_link( 'Newer posts' ); ?></span>
</div>
<?php endif; ?>