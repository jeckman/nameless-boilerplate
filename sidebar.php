<aside id="sidebar">
<div class="sidebar_box">
<?php fb_get_search_form(); ?>
</div>

<div class="sidebar_box">
<a href="/about"><img style="margin-left: 10px; margin-bottom: 5px;" src="/wp-content/uploads/2010/12/headshot_personality.jpg" width="280" height="157" border="0"></a>
<ul>
<?php wp_list_pages('depth=1&exclude=883,880&title_li='); ?>
<li class="<?php if ( is_home() or is_archive() or is_single() or is_paged() or is_search() or (function_exists('is_tag') and is_tag()) ) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>"><?php _e('Home'); ?></a></li>
</ul>
</div>

<?php 
if(function_exists('special_recent_posts')) {
$args = array(
	
	'srp_thumbnail_option'    => 'yes',
	'srp_widget_title_hide_option' => 'yes',
	'srp_post_offset' => 'yes',
	'srp_content_post_option' => 'titleonly'
	);
	echo '<div class="sidebar_box">';
    	special_recent_posts($args);
	echo '</div>';
}
?>

<div class="sidebar_box">
<h4>Subscribe</h4>
<div class="sidebar_content">
<a href="http://feeds.feedburner.com/OpenParenthesis" title="Subscribe to my feed" rel="alternate" type="application/rss+xml"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="rss" style="border:0"/ align="absmiddle"></a><a href="http://feeds.feedburner.com/OpenParenthesis" title="Subscribe to my feed" rel="alternate" type="application/rss+xml"> Subscribe in an rss reader</a>, or <br /><br />
<form action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">By email: <input type="text" style="width:120px" name="email"/><input type="hidden" value="http://feeds.feedburner.com/~e?ffid=832588" name="url"/><input type="hidden" value="Open Parenthesis" name="title"/><input type="submit" value="Subscribe" /></form>
</div></div>

<div class="sidebar_box">
<h4>Archives</h4>
<ul>
<?php //wp_get_archives('type=monthly&limit=12');  
?>
<?php wp_get_archives('type=yearly'); ?>
</ul>
<div class="sidebar_content">
<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
  <option value=""><?php echo attribute_escape(__('By Month')); ?></option> 
  <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>
</div></div>

<div class="sidebar_box">
<h4>Tag Cloud</h4>
<div class="sidebar_content"><?php wp_tag_cloud('smallest=8&largest=18'); ?></div>
</div>

<div class="sidebar_box">
<h4>Creative Commons</h4>
<div class="sidebar_content">
<a rel="license" href="http://creativecommons.org/licenses/by/3.0/">
	<img alt="Creative Commons License" border="0" src="/images/somerights20.gif"/></a>
      <br/><br />
This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 License</a>.
	<!--/Creative Commons License-->
	<!--
	<rdf:RDF xmlns="http://web.resource.org/cc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
	<Work rdf:about=""><license rdf:resource="http://creativecommons.org/licenses/by/3.0/" /></Work>
	<License rdf:about="http://creativecommons.org/licenses/by/3.0/">
	<permits rdf:resource="http://web.resource.org/cc/Reproduction"/>
	<permits rdf:resource="http://web.resource.org/cc/Distribution"/>
	<requires rdf:resource="http://web.resource.org/cc/Notice"/>
	<requires rdf:resource="http://web.resource.org/cc/Attribution"/>
	<permits rdf:resource="http://web.resource.org/cc/DerivativeWorks"/></License>
	</rdf:RDF>
	-->
</div></div>
</aside>