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
	<h3 id="comments" class="h2"><?php comments_number( '<span>No</span> Responses', '<span>One</span> Response', '<span>%</span> Response', '<span>%</span> Responses', get_comments_number() ); ?> to &#8220;<?php the_title(); ?>&#8221;</h3>
	
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
			<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>

	<!-- If comments are closed. -->
	<!--p class="nocomments">Comments are closed.</p-->

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<section id="respond" class="respond-form">

	<h3 id="comment-form-title" class="h2"><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>

	<div id="cancel-comment-reply">
		<p class="small"><?php cancel_comment_reply_link(); ?></p>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<div class="alert alert-help">
			<p><?php printf( 'You must be %1$slogged in%2$s to post a comment.', '<a href="<?php echo wp_login_url( get_permalink() ); ?>">', '</a>' ); ?></p>
		</div>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

	<p class="comments-logged-in-as">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

	<?php else : ?>

	<ul id="comment-form-elements">

		<li>
			<label for="author">Name <?php if ($req) echo "(required)"; ?></label>
			<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="Your Name*" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		</li>

		<li>
			<label for="email">Email <?php if ($req) echo "(required)"; ?></label>
			<input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="Your E-Mail*" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			<small>(will not be published)</small>
		</li>

		<li>
			<label for="url">Website</label>
			<input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="Got a website?" tabindex="3" />
		</li>

	</ul>

	<?php endif; ?>

	<p><textarea name="comment" id="comment" placeholder="Your Comment here..." tabindex="4"></textarea></p>
	<div class="alert alert-info">
		<p id="allowed_tags" class="small"><small>You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>
	</div>

	<p>
		<input name="submit" type="submit" id="submit" class="button" tabindex="5" value="Submit" />
		<?php comment_id_fields(); ?>
	</p>

	<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>
</section>

<?php endif; // if you delete this the sky will fall on your head ?>