1. Create screenshot
screenshot.png - size [ 880 X 660 px ].

2.Add the these to style.css
/*
Theme Name: Your Theme Name
Theme URI: https://www.yoursite.com/yourtheme
Author: Your Name
Author URI: https://www.yoursite.com/
Description: This WordPress theme is 100% responsive blah blah...
Version: 1.0
License: GNU General Public License V2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: gold, one-column, left-sidebar, responsive-grid, etc
Text Domain: yourthemename
*/

3.Then add the wordpress core css to your theme stylesheet.
/* WordPress Core */
.alignnone { margin: 5px 20px 20px 0;}
.aligncenter,div.aligncenter {display: block; margin: 5px auto 5px auto;}
.alignright {float:right;margin: 5px 0 20px 20px;}
.alignleft {	float: left;	margin: 5px 20px 20px 0;}
a img.alignright {	float: right;	margin: 5px 0 20px 20px;}
a img.alignnone {	margin: 5px 20px 20px 0;}
a img.alignleft {	float: left;	margin: 5px 20px 20px 0;}
a img.aligncenter {	display: block;	margin-left: auto;	margin-right: auto;}
// Image does not overflow the content area 
.wp-caption {	background: #fff;	border: 1px solid #f0f0f0;	max-width: 96%;	padding: 5px 3px 10px;	text-align: center;}
.wp-caption.alignnone {	margin: 5px 20px 20px 0;}
.wp-caption.alignleft {	margin: 5px 20px 20px 0;}
.wp-caption.alignright {	margin: 5px 0 20px 20px;}
.wp-caption img {	border: 0 none;	height: auto;	margin: 0;	max-width: 98.5%;	padding: 0;	width: auto;}
.wp-caption p.wp-caption-text {	font-size: 11px;	line-height: 17px;	margin: 0;	padding: 0 4px 5px;}

4.Document Head (header.php)
Use the proper DOCTYPE.
The opening <html> tag should include language_attributes().
The <meta> charset element should be placed before everything else, including the <title> element.
Use bloginfo() to set the <meta> charset and description elements.
Use wp_title() to set the <title> element. See why.
Use Automatic Feed Links to add feed links.
Add a call to <?php wp_head() ?> before the closing </head> tag.
Plugins use this action hook to add their own scripts, stylesheets, and other functionality.
Do not link the theme stylesheets in the Header template. Use the wp_enqueue_scripts action hook in a theme function instead.

Example :
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<?php bloginfo(‘name’); ?> – This displays the title of your WordPress blog/site
<?php bloginfo(‘url’); ?> – This template tag displays the URL of your blog
<?php bloginfo(‘description’); ?> – This displays the description, or rather the tagline, of your blog.
<?php bloginfo(‘charset’); ?> – Displays the character set used to encode your site. Default is UTF-8
<?php bloginfo(‘stylesheet_url’); ?> – This shows URL to the CSS stylesheet of your active theme
<?php bloginfo(‘version’); ?> – Displays the WordPress version you’re using
<?php bloginfo(‘language’); ?> – Displays the language of WordPress
<?php bloginfo(‘rss_url’); ?> – Displays URL for the RSS 0.92 feed
<?php bloginfo(‘rss2_url’); ?> – Displays URL for the RSS 2.0 feed
<?php bloginfo('template_url'); ?> – Location of Site’s Theme File
<?php site_url(); ?>
<?php home_url();?>

/*
body_class();
post_class();
comment_class();
*/

<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<body <?php body_class(); ?>>

Location of Site’s Theme File
<?php bloginfo('template_url');?>
<?php echo get_template_directory_uri(); ?>

This shows URL to the CSS stylesheet of your active theme
<?php bloginfo('stylesheet_url');?>
<?php echo get_stylesheet_uri(); ?>
<?php echo get_stylesheet_directory_uri(); ?>

<?php get_header(); ?> - header.php
<?php get_footer(); ?> - footer.php
<?php get_sidebar(); ?>- sidebar.php

<a href="<?php bloginfo( 'url' );?>">
	<?php if ( of_get_option( 'theme_logo' ) ){ ?>
	<img src="<?php echo of_get_option( 'theme_logo' );?>" alt="logo" class="img-responsive" />
	<?php }else{
	echo get_bloginfo( 'name' );
	}?>
</a>

<?php dynamic_sidebar(''); ?> //id of widget
<?php is_dynamic_sidebar() ?> // check the widget
<?php is_active_sidebar('sidebar-1') ?> //Check side bar

<?php has_nav_menu(''); ?> //Check the Menu Exsist.
<?php is_nav_menu(); ?> // check the menu
<?php wp_nav_menu( array( 'theme_location' => 'main','container' => false, 'items_wrap'=> '<ul class="nav navbar-nav">%3$s</ul>') );?> //call the Menu

<?php register_nav_menu(); ?> // Register Menu

<?php get_template_part('page');?> page name without extension - Include page

<?php 
	if(have_posts())
	{
		while(have_posts())
		{
			the_post();
			the_title();
			wpautop(the_content());
			wpautop(the_excerpt());
			the_permalink();
			the_time();
			the_date();
			echo human_time_diff( get_the_time('U'), current_time('timestamp') ); //days ago
		}
	 }
?>

<?php 
	if(have_posts())
	{
		while(have_posts())
		{
			echo get_the_post();
			echo get_the_title();
			echo get_the_content();
			echo get_the_excerpt();
			echo get_the_permalink();
			echo get_the_time();
			echo get_the_date();
			echo human_time_diff( get_the_time('U'), current_time('timestamp') ); //days ago
		}
	 }
?>
//For Single post
<?php 
	$post=get_post('postid'); setup_postdata($post);
	the_title();
	the_excerpt();
	the_post_thubmnail();
	wp_reset_postdata(); 
?>

<?php get_permalink(''); ?> // use id of post
<?php get_page_by_tilte('');?> //page name
<?php the_post_thumbnail('178*148'); // Post Featured image ?>
<?php has_post_thumbnail() ?> // check the featured image is there

<?php wp_register(); ?> – Displays Register Link.
<?php wp_loginout(); ?> – Displays Login/Logout Link only to Registered Users.
<?php wp_logout_url( home_url() );?> - logout with redirect link.

References:
https://codex.wordpress.org/Function_Reference
https://www.apptha.com/blog/basic-functions-for-the-wordpress-beginners/
http://www.webdesignerdepot.com/2013/05/1-key-wordpress-functions-to-jump-start-theme-development/
http://www.wpbeginner.com/wp-tutorials/25-extremely-useful-tricks-for-the-wordpress-functions-file/

/*----------------------=|-|  Comments |-|=---------------------------- */
#comments {clear: both;padding:0; font-size:13px;}
#comments .navigation {padding: 0 0 18px 0;}
h2.comments-title { padding-bottom:10px; }
h3#comments-title,h3#reply-title {font-size: 20px;font-weight: bold;	margin-bottom: 0;}
h3#comments-title {padding: 24px 0;}
.commentlist {list-style: none;margin: 0; padding:0; }
.commentlist header{ border-top: none; }
.commentlist header h4 { padding-left:10px; font-size:24px; background:none; padding-bottom:0px; }
.commentlist section { padding-left:10px; }
.commentlist p { padding:0 10px 0 0 !important; font-size:13px; width:auto !important; margin-top:10px;}
.commentlist li.comment {line-height: 18px;margin: 0 0 6px 0;padding:5px 0 5px 75px;position: relative; background:#E6E6E6;}
.commentlist li:last-child {border-bottom: none;margin-bottom: 0;}
#comments .comment-body ul,#comments .comment-body ol {margin-bottom: 18px;}
#comments .comment-body p:last-child {margin-bottom: 6px;}
#comments .comment-body blockquote p:last-child {margin-bottom: 24px;}
.commentlist ol {list-style: decimal;}
.commentlist .avatar {position: absolute;top: 6px;left: 6px;}
.comment-author {}
.url {color: #013648;font-size: 15px;font-weight: bold;line-height: 20px;}
.comment-author cite {font-style: normal;font-weight: bold; font-size:16px;}
.comment-author .says {font-style: italic; font-size:16px;}
.comment-meta {font-size: 12px;}
.comment-meta a:link,.comment-meta a:visited {color: #888;text-decoration: none;}
.comment-meta a:active,.comment-meta a:hover {color: #ff4b33;}
.commentlist .even {}
.commentlist .bypostauthor {}
.reply {font-size: 12px;padding: 10px 0;}
.reply a,a.comment-edit-link {color: #888;}
.reply a:hover,a.comment-edit-link:hover {color: #ff4b33;}
.commentlist .children {list-style: none;margin: 0;}
.commentlist .children li {border: none;margin: 0;}
.nopassword,.nocomments {display: none;}
#comments .pingback {border-bottom: 1px solid #666666;margin-bottom: 18px;padding-bottom: 18px;}
.commentlist li.comment+li.pingback {margin-top: -6px;}
#comments .pingback p {color: #888;display: block;font-size: 12px;line-height: 18px;margin: 0;}
#comments .pingback .url {font-size: 13px;font-style: italic;}
/**/

/**submenu**/
.mainmenu .sub-menu {list-style: outside none none;	min-width: 333px;	padding: 0;	position: absolute;	z-index: 1000;	display:none;}
.mainmenu li:hover .sub-menu {	display:block;}
.mainmenu .sub-menu li{}
.mainmenu .sub-menu li a {background: none repeat scroll 0 0 #f63;	display: block;	padding: 10px 15px;	text-align: left;	text-decoration: none;	transition: all 1s ease-in-out 0s;}
.mainmenu .sub-menu li a:hover {	background:#b10000;	border-left:5px solid #0d0d0d;	padding-left:25px;}
/**submenu**/

==================================================================================================

Disable Theme and Plugin Editors from WordPress Admin Panel
<?php define( 'DISALLOW_FILE_EDIT', true ); ?>

Disable Plugin and Theme Update and Installation:
<?php define('DISALLOW_FILE_MODS',true); ?>

For Multisite / Network Wordpress 
==================================
/******** Insert after DEBUG 'false' OR  Immediately above that line( /* That's all, stop editing! Happy blogging. */ )*******/
<?php 
//https://codex.wordpress.org/Create_A_Network

define( 'WP_ALLOW_MULTISITE', true );

define('MULTISITE', true);

define('SUBDOMAIN_INSTALL', false);

define('DOMAIN_CURRENT_SITE', 'localhost');

define('PATH_CURRENT_SITE', '/projects/multisite/');

define('SITE_ID_CURRENT_SITE', 1);

define('BLOG_ID_CURRENT_SITE', 1);

?>
============================================

Robots.txt
==========
#
User-agent: *
Disallow: /cgi-bin
Disallow: /wp-admin
Disallow: /wp-includes
Disallow: /wp-content/plugins/
Disallow: /wp-content/cache/
Disallow: /wp-content/themes/
Disallow: */trackback/
Disallow: */feed/
Disallow: /*/feed/rss/$
Disallow: /category/*

===================================

///function.php
<?php 
// admin logo change
function custom_loginlogo() { echo '<style type="text/css">h1 a {background-image: url('.of_get_option("theme_logo").') !important;background-position: center top !important;background-repeat: no-repeat !important; background-size: auto !important;display: block !important;height: 50px !important;margin: 0 auto 25px !important;outline: 0 none !important;padding: 0 !important;text-indent: -9999px !important;width: 65% !important;}</style>';}
add_action('login_head', 'custom_loginlogo');
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function theme_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="'.of_get_option("theme_fav").'" />';
}
add_action('wp_head', 'theme_favicon');
add_action('admin_head', 'theme_favicon');

============================================================

//Initial Settings
add_theme_support('post-thumbnails');

//Post thumbnail size define Here
add_image_size( 'slider', 1500, 680, true );

//Menus
register_nav_menu('main', 'Mainmenu navigation menu');

//Widget Area
register_sidebar(array(
  'name' => __( 'Sidebar-1' ),
  'id' => 'theme_sidebar_1',
  'before_title' => '<h4>',
  'after_title' => '</h4>'
));

===========================================================

/*Add css & jquer files to FRONT END*/
function themename_scripts() {
	wp_enqueue_style( 'paper-bootstrap', get_template_directory_uri() .'/css/bootstrap.css', array(), 'v3.3.6', 'screen' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
	wp_enqueue_style( 'paper-base', get_stylesheet_uri() );
	wp_enqueue_script( 'paper-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), 'v3.3.6', true );
	wp_enqueue_script( 'paper-custom', get_template_directory_uri() . '/js/custom.js', array(), '0.1', true );
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}
add_action( 'wp_enqueue_scripts', 'themename_scripts' );

/*Add scripts to ADMIN END*/
function themeadmin_enqueue() {
	wp_enqueue_style( 'theme-admin-style', get_template_directory_uri() .'/restaurant/css/backend-style.css');
	wp_enqueue_script( 'theme-admin-custom-js', get_template_directory_uri() .'/restaurant/js/backend-custom.js');
}
add_action('admin_enqueue_scripts', 'themeadmin_enqueue');

=================================================================
'supports' => 
	array( 
		'title',
		'editor',
		'author',
		'thumbnail',
		'excerpt',
		'trackbacks',
		'custom-fields',
		'comments',
		'revisions',
		'page-attributes',
		'post-formats'
	);

/*Register Post Type*/
$labels = array( 'name' => 'Slider', 'singular_name' => 'Slider', 'add_new' => 'Add New', 'add_new_item' => 'Add New Slider', 'edit_item' => 'Edit Slider', 'new_item' => 'New Slider', 'all_items' => 'All Sliders', 'view_item' => 'View Slider', 'search_items' => 'Search Sliders', 'not_found' =>  'No Sliders found', 'not_found_in_trash' => 'No Sliders found in Trash', 'parent_item_colon' => '', 'menu_name' => 'Sliders' );

$args = array( 'labels' => $labels, 'public' => true, 'publicly_queryable' => true, 'show_ui' => true,  'show_in_menu' => true, 'query_var' => true, 'rewrite' => array( 'slug' => 'slider' ), 'capability_type' => 'post', 'has_archive' => true, 'hierarchical' => false,'menu_position' => null,'supports' => array( 'title', 'thumbnail', 'editor' )); 

register_post_type( 'slider', $args );

/*Register Taxonamy*/
$args = array(
	'hierarchical'          => true,
	'show_ui'               => true,
	'labels'                => array('name' => 'Category' , 'menu_name' => 'Category' ),
	'show_admin_column'     => true,
	'update_count_callback' => '_update_post_term_count',
	'query_var'             => true,
	'rewrite'               => array( 'slug' => 'slider_category' ),
);
register_taxonomy( 'slider_category', 'slider', $args );

add_action( 'add_meta_boxes', 'add_metaboxes' );
function add_metaboxes() {
	add_meta_box( 'add_metaboxes', 'Meta Box Details', 'display_meta_box','slider', 'normal', 'high' );
}
function display_meta_box( $post ) {
	?>
	<table class="res-table">
		<tbody>
			<tr class="res-field">
				<td class="res-label">metabox</td>
				<td class="res-input">
					<input type="text" name="meta[metabox]" id="metabox" class="form-control" value="<?php echo get_post_meta(get_the_ID(), 'metabox', true);?>">
				</td>
			</tr>
		</tbody>
	</table>
<?php 
}
add_action( 'save_post', 'add_metabox_fields', 10, 2 );
function add_metabox_fields( $post_id, $post ) {
	if ( $post->post_type == 'slider' ) {
		if ( isset( $_POST['meta'] ) ) {
			foreach( $_POST['meta'] as $key => $value ){
				update_post_meta( $post_id, $key, $value );
			}
		}
	}
}

=======================================================================
wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' );
Browse <input type="file" name="my_image_upload" id="my_image_upload" class="form-control"  multiple="false" >

/* Image Upload */
function imageUploadToPost($key,$id){
	if ( isset( $_POST[$key.'_nonce'] ) && wp_verify_nonce( $_POST[$key.'_nonce'], $key)&& current_user_can( 'edit_post', $id ) ) {
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
		$attachment_id = media_handle_upload( $key, $id );
		set_post_thumbnail($id, $attachment_id);
		if ( is_wp_error( $attachment_id ) ) {
			//echo "Image Uploading error";
		}
	}
}

imageUploadToPost('my_image_upload',$insert_post_id);

=======================================================================
/***Hide Admin Bar Except Administrator***/
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

//Custom Excerpt content
function excerpt( $num=50 )
{
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt);
	echo $excerpt;
}

/*Confirmation Email for Contactform 7*/
add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );
function custom_email_confirmation_validation_filter( $result, $tag ) {
    $tag = new WPCF7_Shortcode( $tag );
    if ( 'your-email-confirm' == $tag->name ) {
        $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
        $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
        if ( $your_email != $your_email_confirm ) {
            $result->invalidate( $tag, "Are you sure this is the correct address?" );
        }
    }
    return $result;
}

========================================================================
/***************For WooCommerce****************/
//Declare WooCommerce support to Theme for woocommerce sites.
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) { 
ob_start();
	?>
	<a  href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>" class="cart-contents"><i class="fa fa-shopping-cart"></i><?php echo sprintf ( WC()->cart->cart_contents_count ); ?> My Cart</a>
	<?php
	$fragments['a.cart-contents'] = ob_get_clean();
	return $fragments;
}
/*Password strength Remover*/
function wc_ninja_remove_password_strength() {
	if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
		wp_dequeue_script( 'wc-password-strength-meter' );
	}
}

?>