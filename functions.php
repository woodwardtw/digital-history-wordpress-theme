<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
   wp_enqueue_script('map-script', get_stylesheet_directory_uri() . '/js/map.js', 'leaflet', '2', true);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_filter('widget_text', 'do_shortcode');

//function to call first uploaded image in functions file
function main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
		$template=get_template_directory();
		$the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='frame' />";
  endif;
}

add_action('wp_enqueue_scripts', 'externalScripts');
function externalScripts() {
  wp_enqueue_script('leaflet', 'https://unpkg.com/leaflet@1.0.2/dist/leaflet.js', array(), '3', false);
  wp_enqueue_style('leafletCSS','https://unpkg.com/leaflet@1.0.2/dist/leaflet.css');
  wp_enqueue_style('animation','https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css');
}