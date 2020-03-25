<?php
/**
 * Functions and definitions
 * @package adtrak_boilerplate
 */

require('_wp/custom-dash.php');
require("_wp/wp-head.php");
require("_wp/wp-cpt.php");

/* ========================================================================================================================
	
jQuery (place in footer)
	
======================================================================================================================== */

function my_init()   
{  
    if (!is_admin())   
    {  
        wp_deregister_script('jquery');  
        // Load the copy of jQuery that comes with WordPress  
        // The last parameter set to TRUE states that it should be loaded  
        // in the footer.  
        //wp_register_script('jquery-footer', '/wp-includes/js/jquery/jquery.js', false, '1.11.0', true);  
        //wp_enqueue_script('jquery-footer');  
    }  
}  
add_action('init', 'my_init');

/* ========================================================================================================================
    
Remove smileys & emojis & embed.js
    
======================================================================================================================== */

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/* ========================================================================================================================
    
Remove embed for media etc (when posting URLs etc)
    
======================================================================================================================== */

function remove_embed_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'remove_embed_scripts' );

/* ========================================================================================================================
	
Remove query string from CSS & JS
	
======================================================================================================================== */

// Remove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

/* ========================================================================================================================
	
Enqueue scripts and stylesheets
	
======================================================================================================================== */

function site_script_loader() {
	// Style sheets
    wp_enqueue_style( 'master', get_stylesheet_directory_uri() . '/_css/master.css', '', null );
    wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css?family=Hind|Montserrat:400,700' );
    // Scripts
    wp_enqueue_script( 'production', get_template_directory_uri() .'/_js/production.min.js','','', true  );

    /* ========================================================================================================================
        
    Add variables to WP_Localize so we can use them in ajax-form
        
    ======================================================================================================================== */

    $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
    wp_localize_script( 'production', 'object_name', $translation_array );
}

add_action( 'wp_enqueue_scripts', 'site_script_loader' );

/* ========================================================================================================================
	
Navigation
	
======================================================================================================================== */

function register_menus() {
  register_nav_menus(
    array(
      'main' => __( 'Main Nav' ),
      'locations' => __( 'Locations' )
    )
  );
}

add_action( 'init', 'register_menus' );

/* ========================================================================================================================
	
Enable Featured Image
	
======================================================================================================================== */

add_theme_support('post-thumbnails');

/* ========================================================================================================================
	
Allow SVG in media library
	
======================================================================================================================== */

function allow_svg( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'upload_mimes', 'allow_svg' );

/* ========================================================================================================================
	
Image handling
	
======================================================================================================================== */

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function my_image_class_filter() {
	return 'w100' ;
}

function stop_thumbs($sizes){
      return array();
}

add_filter('get_image_tag_class', 'my_image_class_filter');
add_filter('post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter('image_send_to_editor', 'remove_width_attribute', 10 );
add_filter('jpeg_quality', create_function( '', 'return 50;' ) );

/* ========================================================================================================================
	
Remove P tags from images through WYSIWYG
	
======================================================================================================================== */

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

/* ========================================================================================================================
	
Remove YOAST Bar for non-admins
	
======================================================================================================================== */

function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    if(!current_user_can( 'install_themes' ) ) {
        $wp_admin_bar->remove_menu('wpseo-menu');
        remove_meta_box('wpseo_meta', 'page', 'normal');
        remove_meta_box('wpseo_meta', 'post', 'normal');
        remove_meta_box('wpseo_meta', 'custom-post-type-slug', 'normal');
    }
}
// and we hook our function via
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

/* ========================================================================================================================
	
Hide frontend toolbar
	
======================================================================================================================== */

add_filter('show_admin_bar', '__return_false'); 

/* ========================================================================================================================
	
Custom image sizes
	
======================================================================================================================== */

add_action( 'after_setup_theme', 'custom_image_sizes' );
function custom_image_sizes() {
	/* Useful for buckets */
	add_image_size( 'square-350', 350, 350, true );
	/* Hero images */
	add_image_size( 'hero-1400', 1400, 700, true );
	add_image_size( 'hero-1000', 1000, 700, true );
	add_image_size( 'hero-800', 800, 550, true );
	add_image_size( 'hero-500', 500, 500, true );
}

/* ========================================================================================================================
    
Hero Picturefill Function
    
======================================================================================================================== */

function heroPictureFill($sizes, $default) {
    $alt = get_field('h1');
    echo "<picture>
          <!--[if IE 9]><video style='display: none;'><![endif]-->";
    foreach($sizes as $size => $option) {
        $attachment = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "hero-".$option['imageSize'] );
        $attachment = $attachment['0'];
        echo "<source srcset='$attachment' media='(".$option['mediaQuery'].")'>";
    }
    echo "<!--[if IE 9]></video><![endif]-->";
    echo "<img srcset='$default' alt='$alt'>";
    echo "</picture>";
}

/* ========================================================================================================================

Show ALT tag for images in Media Library (IM request)

======================================================================================================================== */

function wpse_media_extra_column( $cols ) {
$cols["alt"] = "ALT";
return $cols;
}
function wpse_media_extra_column_value( $column_name, $id ) {
    if( $column_name == 'alt' )
        echo get_post_meta( $id, '_wp_attachment_image_alt', true);
}
add_filter( 'manage_media_columns', 'wpse_media_extra_column' );
add_action( 'manage_media_custom_column', 'wpse_media_extra_column_value', 10, 2 );

/* ========================================================================================================================
	
Move Yoast lower down the page
	
======================================================================================================================== */

add_filter( 'wpseo_metabox_prio', function() { return 'low';});

/* ========================================================================================================================
	
Options pages
	
======================================================================================================================== */

if( function_exists('acf_add_options_page') ) {

	$optionspage = acf_add_options_page(array(
		'page_title' 	=> 'Site Specific',
		'menu_title' 	=> 'Site Specific',
		'menu_slug' 	=> 'site-specific',
		'position' 		=> 75,
		'capability' 	=> 'edit_posts',
		'icon_url' 		=> 'dashicons-hammer',
		'redirect' 		=> false
	));

	$optionspage = acf_add_options_page(array(
		'page_title' 	=> 'Marketing',
		'menu_title' 	=> 'Marketing',
		'menu_slug' 	=> 'marketing',
		'position' 		=> 75,
		'capability' 	=> 'edit_themes',
		'icon_url' 		=> 'dashicons-randomize',
		'redirect' 		=> false
	));

}

/* ========================================================================================================================
	
Address - Stacked
	
======================================================================================================================== */

function address_stacked() {

	// loop through the rows of data
	while ( have_rows('company_address', 'options') ) : the_row();

	// display a sub field value
	the_sub_field('address_line', 'options');

	echo "<br/>";

	endwhile;

	the_field('company_postcode', 'option');

}

/* ========================================================================================================================
	
Address - Inline
	
======================================================================================================================== */

function address_inline() {

	// loop through the rows of data
	while ( have_rows('company_address', 'options') ) : the_row();

	// display a sub field value
	the_sub_field('address_line', 'options');

	echo ",&nbsp;";

	endwhile;

	the_field('company_postcode', 'option');

}

/* ========================================================================================================================
	
Enable Widgets
	
======================================================================================================================== */

function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'News Sidebar',
		'id'            => 'news_sidebar',
		'before_widget' => '<div class="aside-list">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/* ========================================================================================================================
    
Hide comments
    
======================================================================================================================== */

function emersonthis_custom_menu_page_removing() {
  remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'emersonthis_custom_menu_page_removing' );