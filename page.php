<?php get_header(); ?>
<div id="content" class="clearfix">
		<div class="content_left">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
					

					<div class="entry">

					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php the_content('[...]'); ?>
					</div>
				<div class="clear"></div>
				</div>
			<?php endwhile; ?>
			<?php else : ?>
			<?php endif; ?>
		</div>
		<div class="sidebar">
			<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
		</div>
</div><!-- ### ende content ### -->

<?php get_footer(); ?>