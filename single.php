<?php get_header(); ?>
<section id="main-content" role="main">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="postdate">Published on <?php the_time('l, F j Y') ?> <?php edit_post_link('#', '', ''); ?></div>
				<?php the_content('[...]'); ?>

	<div class="postmeta_single"><?php the_tags()  ?></div>

<div id="navigation">
<ul class="postnavi">
<li>Previous: <?php previous_post_link('%link') ?></li>
<?php /* if next post exists */ next_post_link('<li>Next: %link</li>'); ?>
</ul>
</div>

                        <?php endwhile; ?>


			<?php else : ?>
			<article>
			<h2>Nothing to see here</h2>
			<p>You seemed to have found a mislinked file, page, or search query with zero results. If you feel that you've reached this page in error, double check the URL and or search string and try again.</p>
			<?php endif; ?>

<!--### Kommentare ###-->
<?php comments_template(); ?>

		</article>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>