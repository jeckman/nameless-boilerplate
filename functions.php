<?php
if ( function_exists('register_sidebar') )
	register_sidebar();

add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');

add_theme_support( 'post-thumbnails' );




function fixed_img_caption_shortcode($attr, $content = null) {
  $output = apply_filters('img_caption_shortcode', '', $attr, $content);
  if ( $output != '' ) return $output;
  extract(shortcode_atts(array('id'=> '','align' => 'alignnone','width' => '','caption' => ''), $attr));
  if ( 1 > (int) $width || empty($caption) )
    return $content;
  $width = $width + 35;
  if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . ((int) $width) . 'px">' 
    . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

function fb_get_search_query() {
	$return = stripslashes( get_query_var( 's' ) );
	if ( $return == '' )
		$return = __( 'Search ...', FB_BASIS_TEXTDOMAIN );
	else
		$return = apply_filters( 'get_search_query', $return );

	return $return;
}
add_filter( 'the_search_query', 'fb_get_search_query' );

function fb_get_search_form() {
    do_action( 'get_search_form' );

    $form = '<form method="get" id="searchform" action="' . get_option('home') . '/" >
    <input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" onfocus="clearSearch();" style="width: 180px" />
	<input id="searchsubmit" type="image" src="'. get_bloginfo('template_directory') .'/images/search.gif" alt="Submit" />
    </form>';

    echo apply_filters('get_search_form', $form);
}

function nameless_init() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_style('thickbox'); 
		wp_enqueue_script('thickbox');  

	}
}
add_action('init', 'nameless_init');



wp_enqueue_script( 'fb_scripts', get_bloginfo('template_directory') . '/js/nameless.js', '', '', true );


function mytheme_tinymce_config( $init ) {
 $valid_iframe = 'iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]';
 if ( isset( $init['extended_valid_elements'] ) ) {
  $init['extended_valid_elements'] .= ',' . $valid_iframe;
 } else {
  $init['extended_valid_elements'] = $valid_iframe;
 }
 return $init;
}
add_filter('tiny_mce_before_init', 'mytheme_tinymce_config');


?>