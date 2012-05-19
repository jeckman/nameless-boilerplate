<?php get_header(); ?>
<div id="content" class="clearfix">
		<div class="content_left">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="entry">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="postdate">Published on <?php the_time('l, F j Y') ?> <?php edit_post_link('#', '', ''); ?></div>
				<?php the_content('[...]'); ?>

				</div>			
				<div class="clear"></div>
	<div class="postmeta_single"><?php the_tags()  ?></div>

			</div>
<div>&nbsp;</div>
<div id="navigation">
<ul class="postnavi">
<li>Previous: <?php previous_post_link('%link') ?></li>
<?php /* if next post exists */ next_post_link('<li>Next: %link</li>'); ?>
</ul>
</div>

<div class="clear">&nbsp;</div>

                        <?php endwhile; ?>


			<?php else : ?>
			<h2>Nothing to see here</h2>
			<p>You seemed to have found a mislinked file, page, or search query with zero results. If you feel that you've reached this page in error, double check the URL and or search string and try again.</p>
			<?php endif; ?>

<!--### Kommentare ###-->
<?php comments_template(); ?>

		</div>
		<div class="sidebar">
		<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
		</div>
		
		<div class="clear"></div>
</div><!--### ende content ###-->

<?php get_footer(); ?>