<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->
<?php if ($comments) : ?>
<div id="comments_title" class="clearfix">
	<div id="comment_meta"><?php comments_number('0 Comments', '1 Comment', '% Comments' );?>. <a href="#respond">Leave a comment</a> or send a <a href="<?php trackback_url(true); ?>" rel="trackback">Trackback</a>.</div>
</div>

<!--<a name="showpings"></a>-->
	<ol class="pingslist">        
	<?php foreach ($comments as $comment) : ?>
	<?php if (get_comment_type() != "comment"){ ?>

 
                <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
		<div class="comment_credentials">
                <img class="cmt-gravatar" src="<?php bloginfo('stylesheet_directory'); ?>/images/pingback.gif" alt="Pingback" />
		
		</div>
		<div class="comment_text_tb">
                Trackback: <strong><?php comment_author_link() ?></strong> &bull; <?php comment_date('F j Y') ?> <?php edit_comment_link('(Edit.)','',''); ?>
		<p><?php comment_author_link() ?></p>
		</div>
<div class="clear"></div>
		</li>

	<?php /* Changes every other comment to a different class */
	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';
	?>
	<?php } ?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>


	<ol class="commentlist">
<?php $relax_comment_count=1; ?>
	
	<?php foreach ($comments as $comment) : ?>
	<?php if (get_comment_type() == "comment"){ ?>

	<li class="<?php if ($comment->comment_author_email == "eckman.john@gmail.com") echo 'author'; else echo $oddcomment; ?> item" id="comment-<?php comment_ID() ?>">
		<div class="comment_credentials">
<?php echo get_avatar($comment->comment_author_email, '40'); ?>			
		</div>	
		<div class="comment_text">
		<?php if ($comment->comment_approved == '0') : ?>
		<em>Your Comment is under Moderation.</em>
		<?php endif; ?>
#<?php echo $relax_comment_count; ?> &bull; <strong><?php comment_author_link() ?></strong> said on <a class="commentlink" href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F j Y') ?></a>: <?php edit_comment_link('(Moderate)','',''); ?>
<div>&nbsp;</div>
		<?php comment_text() ?>
		</div>
		<div class="clear"></div>
		</li>
	
	<?php /* Changes every other comment to a different class */
	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';
	?>
	<?php } ?>
<?php $relax_comment_count++; ?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>

 	<?php else : // this is displayed if there are no comments so far ?>

  	<?php if ('open' == $post->comment_status) : ?> 
		<div id="comments_title" class="clearfix">
			
	<div id="comment_meta"><?php comments_number('0 Comments', '1 Comment', '% Comments' );?>. <a href="#respond">Leave a comment</a> or send a <a href="<?php trackback_url(true); ?>" rel="trackback">Trackback</a>.</div>
		</div>
		
	 <?php else : // comments are closed ?>
		<p class="nocomments">Comments are closed.</p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<h3 id="respond">&nbsp;</h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out">Logout &raquo;</a></p>

<?php else : ?>

<p>
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label>
</p>

<p>
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail <?php if ($req) echo "(required)"; ?></small></label>
</p>

<p>
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label>
</p>

<?php endif; ?>

<p>
Comment:
<textarea name="comment" id="comment" cols="60" rows="10" tabindex="5"><?php if (function_exists('quoter_comment_server')) { quoter_comment_server(); } ?></textarea></p>


<p><input name="submit" type="image" src="<?php bloginfo('template_directory'); ?>/images/send.gif" alt="Submit" id="submit" tabindex="5" value="Submit" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
<p><?php if (function_exists('subscribe_reloaded_show')) subscribe_reloaded_show(); ?></p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<div class="clear">&nbsp;</div>
<div class="clear">&nbsp;</div>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>