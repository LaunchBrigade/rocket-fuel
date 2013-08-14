<?php
	// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<div class="alert alert-help">
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
		</div>
	<?php
		return;
	}

	$comments_total_pages = get_comment_pages_count();
?>

<!-- You can start editing here. -->

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

	<ol class="commentlist">
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

	<?php else : // comments are closed ?>

	<!--p class="nocomments">Comments are closed.</p-->

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>
	<?php comment_form(); ?>
<?php endif; // If registration required and not logged in ?>