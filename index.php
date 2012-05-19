<?php get_header(); ?>
<div id="content" class="clearfix">	
		<div class="content_left">
			<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h4>Archive for Category &#8216;<?php echo single_cat_title(); ?>&#8216; </h4>

<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h4>Archive for Tag &#8216;<?php echo single_tag_title(); ?>&#8216;</h4>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h4>Daily archive for <?php the_time('j. F Y'); ?></h4>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h4>Monthly archive for <?php the_time('F Y'); ?></h4>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h4>Yearly archive for <?php the_time('Y'); ?></h4>
				
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h4>Autore archive</h4>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
				<div class="entry">
                             
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

                                <div class="postdate">Published on <?php the_time('l, F j Y') ?></div>

                                <?php the_content(__('<br />Read more...<br />')); ?>

				</div>
				<div class="clear"></div>
				</div>
                                <div class="postmeta"><?php the_tags() ?><br /><br />

<?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?> <?php edit_post_link('| (#)', '', ''); ?></div>
		<?php endwhile; ?>
		<?php else : ?>
			        <div class="post" id="post-<?php the_ID(); ?>">
   				<h2>Nothing to see here</h2>

				<div class="entry">

				<p>You seemed to have found a mislinked file, page, or search query with zero results. If you feel that you've reached this page in error, double check the URL and or search string and try again.</p>
				</div>
			<div class="clear"></div>
			</div>
			<?php endif; ?>
			<br />
                        <div id="postnavi_index">
                        <div class="left"><?php next_posts_link('&laquo; Previous') ?></div>
                        <div class="right"><?php previous_posts_link('Next &raquo;') ?></div>
                        </div>
			<div class="clear"></div>
		</div>
		<div class="sidebar">
			<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
		</div>
		<div class="clear"></div>	
</div><!-- ### ende content ### -->

<?php get_footer(); ?>