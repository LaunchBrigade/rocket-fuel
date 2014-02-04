<?php if ( post_password_required() ) : ?>
	<div class="alert alert-help">
		<p class="comments-hidden">This post is password protected. Enter the password to view comments.</p>
	</div>
<?php return; endif; ?>

<?php $comments_total_pages = get_comment_pages_count(); ?>
<?php if ( have_comments() ) : ?>

	<h3 id="comments"><?php comments_number( '<span>No</span> Responses', '<span>One</span> Response', '<span>%</span> Responses' ); ?> to &#8220;<?php the_title(); ?>&#8221;</h3>
	
	<?php if ( $comments_total_pages > 1 ) : ?>
		<nav id="comment-nav">
			<ul>
					<li><?php previous_comments_link() ?></li>
					<li><?php next_comments_link() ?></li>
			</ul>
		</nav>
	<?php endif; ?>

	<ol class="comment-list">
		<?php wp_list_comments(); ?>
	</ol>

	<?php if ( $comments_total_pages > 1 ) : ?>
		<nav id="comment-nav">
			<ul>
					<li><?php previous_comments_link() ?></li>
					<li><?php next_comments_link() ?></li>
			</ul>
		</nav>
	<?php endif; ?>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- Comments are open, but there are no comments. -->
		<p class="nocomments">There are no comments yet. Be the first.</p>

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>
	<?php comment_form(); ?>
<?php endif; // If registration required and not logged in ?>