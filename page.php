<?php get_header(); ?>
<section id="main-content" role="main">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<article class="post" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php the_content('[...]'); ?>
				</article>
			<?php endwhile; ?>
			<?php else : ?>
			<?php endif; ?>
			
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>