<?php
/**
 * Kage functions and definitions
 *
 * @package Kage
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', esc_url(get_template_directory_uri() . '/inc/') );
	require( get_template_directory() . '/inc/options-framework.php' );
}
if ( ! function_exists( 'kage_setup' ) ) :
function kage_setup() {
    global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 1014; }
	register_nav_menu( 'primary', __( 'Top Menu', "kage" ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'custom-background' );	
	$custom_header_support = array(
		'default-text-color' => '000',
		'flex-height' => true,
	);
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'large-feature', 600, 480, true );
	add_image_size( 'small-feature', 500, 300 );

}
endif; 
add_action( 'after_setup_theme', 'kage_setup' );


if ( ! function_exists( 'kage_of_register_js' ) ) :
function kage_of_register_js() {
	if (!is_admin()) {
	    wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'),'1.0', true);
		wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'),'1.0', true);
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif; 
add_action('wp_enqueue_scripts', 'kage_of_register_js');

if ( ! function_exists( 'kage_widgets_init' ) ) :
function kage_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Sidebar Widget Area', "kage"),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area', "kage"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ', 
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><hr>',
	));		
	register_sidebar(array(
		'name' => __( 'Sidebar Portfolio', "kage"),
		'id' => 'sidebar-portfolio',
		'description' => __( 'The sidebar widget portfolio', "kage"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><hr>',
	));	
	register_sidebar(array(
		'name' => __( 'Sidebar Services', "kage"),
		'id' => 'sidebar-services',
		'description' => __( 'The sidebar widget services', "kage"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><hr>',
	));	
	register_sidebar(array(
		'name' => __( 'Sidebar Contact', "kage"),
		'id' => 'sidebar-contect',
		'description' => __( 'The sidebar widget contact', "kage"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><hr>',
	));		
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 1', "kage"),
		'id' => 'footer-widget-area-1',
		'description' => __( 'The footer widget area 1', "kage"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 2', "kage"),
		'id' => 'footer-widget-area-2',
		'description' => __( 'The footer widget area 2', "kage"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 3', "kage"),
		'id' => 'footer-widget-area-3',
		'description' => __( 'The footer widget area 3', "kage"),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"> ',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));	
}
endif;
add_action( 'widgets_init', 'kage_widgets_init' );

if ( ! function_exists( 'kage_head_css' ) ) :
function kage_head_css() {
        $meta = '';
		$output = '';
		
		$fav_icon = of_get_option('fav_icon');
		if ($fav_icon <> '') {
			$meta .= "<link rel=\"shortcut icon\" href=\"".$fav_icon."\" type=\"image/x-icon\" />\n";
		}
		$web_clip = of_get_option('web_clip');
		if ($web_clip <> '') {
			$meta .= "<link rel=\"apple-touch-icon-precomposed\" href=\"".$web_clip."\" />\n";
		}
		$google_site_verification = of_get_option('google_site_verification');
		if ($google_site_verification <> '') {
			$meta .= "<meta name=\"google-site-verification\" content=\"".$google_site_verification."\" />\n";
		}
		$yahoo_site_verification = of_get_option('yahoo_site_verification');
		if ($yahoo_site_verification <> '') {
			$meta .= "<meta name=\"msvalidate.01\" content=\"".$yahoo_site_verification."\" />\n";
		}
		$bing_site_verification = of_get_option('bing_site_verification');
		if ($bing_site_verification <> '') {
			$meta .= "<meta name=\"y_key\" content=\"".$bing_site_verification."\" />\n";
		}	
		
		$custom_css = of_get_option('custom_css_styles');
		if ($custom_css <> '') {
			$output .= $custom_css . "\n";
		}	

		$general_color = esc_attr(of_get_option('general_color'));
		if ($general_color) {
			$options_styles .= '
			.color_blue, a, .logo span, .menutop .current-menu-item a, .menutop a:hover, .menutop a.hover, .menutop .sub-menu a:hover, .menutop .sub-menu a.hover, .bannertitle_large span, .service_item:hover .service_title, .testimonial_auth, .widget_contact span, .widget_recentposts a:hover, .widget_popularposts a span, .widget_popularposts a:hover, .widget_recentcomments a span, .widget_recentcomments a:hover, .meta a:hover, .comment-author .fn {
				color: ' . $general_color . ';
			}
			blockquote {
			border-left: 5px solid ' . $general_color . ';
			}
			th {
			background: none repeat scroll 0 0 ' . $general_color . ';
			}
			abbr, acronym, dfn {
			border-bottom: 1px dotted ' . $general_color . ';
			}
			.border_blue, .menutop .sub-menu, a.service_icon:hover, a:hover .service_icon, .comments_count a:before{
			border-color:' . $general_color . ';
			}
			.bg_blue, .menutopmob a, .button, .icon_zoom, .icon_url, .flex-control-paging li a.flex-active, .comments_count a{
			background-color:' . $general_color . ';
			}
			.pagesidebar .widget ul a:hover {
			color:' . $general_color . ';
			}
			#footer .widget ul a:hover {
			color:' . $general_color . ';
			}
			article  h2 a:hover{
			color:' . $general_color . ';
			}
			.meta_bar .share_block a{
			color:' . $general_color . ';
			}
			.meta_tags a{
			color:' . $general_color . ';
			}
			.simplepag a {
			color:' . $general_color . ';
			}
			.pagination a {
			background-color: ' . $general_color . ';
			}
			.post-password-form input[type=submit] {
				background-color: ' . $general_color . ';
			}			
			.adv_button{
			    color:' . $general_color . ';
			}
			.advertisement, .subscribe, .copyright_block, .pagetitle, input.submit{
			    background-color:' . $general_color . ';
			}
			.pagesidebar .widget #searchsubmit{
				background-color: ' . $general_color . ';
			}
			#footer .widget #searchsubmit{
				background-color: ' . $general_color . ';
			}
			.wpcf7-form .wpcf7-submit {
				background-color: ' . $general_color . ';
			}
			';	
		}		
		
		$header_background = esc_attr(of_get_option('header_background'));
		if ($header_background) {
			$options_styles .= '
			.topbar, .welcome_block, .testimonial_block { 
			    background-color: ' . $header_background . ';
			}';				
		}		
		$title_background = esc_attr(of_get_option('title_background'));
		if ($title_background) {
			$options_styles .= '
			.pagetitle { 
			    background-color: ' . $title_background . ';
			}';				
		}	
		$footer_backgorund = esc_attr(of_get_option('footer_backgorund'));
		if ($footer_backgorund) {
			$options_styles .= '
			#footer { 
			    background-color: ' . $footer_backgorund . ';
			}';				
		}	
		$copyright_backgorund = esc_attr(of_get_option('copyright_backgorund'));
		if ($copyright_backgorund) {
			$options_styles .= '
			.copyright_block { 
			    background-color: ' . $copyright_backgorund . ';
			}';				
		}			
		
        $listfontgoogle = array();	
		$body_font = of_get_option('body_font');
		if ($body_font) {
		    $fontfamily = explode('|',$body_font['face']);
			$options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>";
			$listfontgoogle[] = $fontfamily[0];
		}	
		$menu_font = of_get_option('menu_font');
		if ($menu_font) {
		    $fontfamily = explode('|',$menu_font['face']);
			$options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>";
			$listfontgoogle[] = $fontfamily[0];
		}
		$logo_font = of_get_option('logo_font');
		if ($logo_font) {
		    $fontfamily = explode('|',$logo_font['face']);
			$options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>";
			$listfontgoogle[] = $fontfamily[0];
		}
		$title_page = of_get_option('title_page');
		if ($title_page) {
		    $fontfamily = explode('|',$title_page['face']);
			$options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>";
			$listfontgoogle[] = $fontfamily[0];
		}
		$title_blog = of_get_option('title_blog');
		if ($title_blog) {
		    $fontfamily = explode('|',$title_blog['face']);
			$options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>";
			$listfontgoogle[] = $fontfamily[0];
		}		
		$title_widgets = of_get_option('title_widgets');
		if ($title_widgets) {
		    $fontfamily = explode('|',$title_widgets['face']);
			$options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>";
			$listfontgoogle[] = $fontfamily[0];
		}
		$title_widgets_footer = of_get_option('title_widgets_footer');
		if ($title_widgets_footer) {
		    $fontfamily = explode('|',$title_widgets_footer['face']);
			$options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; 
			$listfontgoogle[] = $fontfamily[0];
		}
		
		$body_font = of_get_option('body_font');
		if ($body_font) {
		    $fontfamily = explode('|',$body_font['face']);
			$options_styles .= '
			body { 
			    '.$fontfamily[1].'
				color:  '.$body_font['color'].';
				font-weight:  '.$body_font['style'].';
				font-size:  '.$body_font['size'].';
			}';		
		}		

		$menu_font = of_get_option('menu_font');
		if ($menu_font) {
		    $fontfamily = explode('|',$menu_font['face']);
			$options_styles .= '
			.menutop a { 
			    '.$fontfamily[1].'
				color:  '.$menu_font['color'].';
				font-weight:  '.$menu_font['style'].';
				font-size:  '.$menu_font['size'].';
			}';		
		}

		$logo_font = of_get_option('logo_font');
		if ($logo_font) {
		    $fontfamily = explode('|',$logo_font['face']);
			$options_styles .= '
			.logo { 
			    '.$fontfamily[1].'
				color:  '.$logo_font['color'].';
				font-weight:  '.$logo_font['style'].';
				font-size:  '.$logo_font['size'].';
			}';		
		}

		$title_page = of_get_option('title_page');
		if ($title_page) {
		    $fontfamily = explode('|',$title_page['face']);
			$options_styles .= '
			.pagetitle h5 { 
			    '.$fontfamily[1].'
				color:  '.$title_page['color'].';
				font-weight:  '.$title_page['style'].';
				font-size:  '.$title_page['size'].';
			}';		
		}
		
		$title_blog = of_get_option('title_blog');
		if ($title_blog) {
		    $fontfamily = explode('|',$title_blog['face']);
			$options_styles .= '
			article h2 a { 
			    '.$fontfamily[1].'
				color:  '.$title_blog['color'].';
				font-weight:  '.$title_blog['style'].';
				font-size:  '.$title_blog['size'].';
			}';		
		}
		
		$title_widgets = of_get_option('title_widgets');
		if ($title_widgets) {
		    $fontfamily = explode('|',$title_widgets['face']);
			$options_styles .= '
			.pagesidebar .widget h3 { 
			    '.$fontfamily[1].'
				color:  '.$title_widgets['color'].';
				font-weight:  '.$title_widgets['style'].';
				font-size:  '.$title_widgets['size'].';
			}';		
		}		

		$title_widgets_footer = of_get_option('title_widgets_footer');
		if ($title_widgets_footer) {
		    $fontfamily = explode('|',$title_widgets_footer['face']);
			$options_styles .= '
			#footer h3, #footer h3 span { 
			    '.$fontfamily[1].'
				color:  '.$title_widgets_footer['color'].';
				font-weight:  '.$title_widgets_footer['style'].';
				font-size:  '.$title_widgets_footer['size'].';
			}';		
		}
		
		
		if ($meta <> '') {
			echo $meta;
		}	
		if($options_styles_import){
			echo $options_styles_import;
		}
		if($options_styles){
			echo '<style>' 
			. $options_styles . '
			</style>';
		}		
		if ($output <> '') {
			$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . esc_html($output) . "</style>\n";
			echo $output;
		}
}
endif;
add_action('wp_head', 'kage_head_css');

if ( ! function_exists( 'kage_social' ) ) :
function kage_social() {
        $sociallist = '';	
		if (of_get_option('url_rss') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_rss').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-rss.png" alt="" /></a></li>'; }
		if (of_get_option('url_deviantart') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_deviantart').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-deviantart.png" alt="" /></a></li>'; }
		if (of_get_option('url_digg') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_digg').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-digg.png" alt="" /></a></li>'; }
		if (of_get_option('url_facebook') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_facebook').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-facebook.png" alt="" /></a></li>'; }
		if (of_get_option('url_flickr') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_flickr').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-flickr.png" alt="" /></a></li>'; }
		if (of_get_option('url_googleplus') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_googleplus').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-googleplus.png" alt="" /></a></li>'; }
		if (of_get_option('url_linkedin') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_linkedin').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-linkedin.png" alt="" /></a></li>'; }
		if (of_get_option('url_myspace') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_myspace').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-myspace.png" alt="" /></a></li>'; }
		if (of_get_option('url_tumblr') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_tumblr').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-tumblr.png" alt="" /></a></li>'; }
		if (of_get_option('url_twitter') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_twitter').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-twitter.png" alt="" /></a></li>'; }
		if (of_get_option('url_vimeo') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_vimeo').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-vimeo.png" alt="" /></a></li>'; }
		if (of_get_option('url_youtube') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_youtube').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-youtube.png" alt="" /></a></li>'; }
		if (of_get_option('url_dribbble') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_dribbble').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-dribbble.png" alt="" /></a></li>'; }
		if (of_get_option('url_pinterest') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_pinterest').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-pinterest.png" alt="" /></a></li>'; }
		if (of_get_option('url_skype') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_skype').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-skype.png" alt="" /></a></li>'; }
		if (of_get_option('url_stumbleupon') <> '') { $sociallist .= '<li><a href="'.of_get_option('url_stumbleupon').'" target="_blank"><img src="'.get_template_directory_uri() . '/images/social/32-stumbleupon.png" alt="" /></a></li>'; }
	
     	if ($sociallist <> '') {
			echo '<ul class="social">'.$sociallist.'</ul>';
		}														
}
endif;

if ( ! function_exists( 'kage_get_list_posts' ) ) :
function kage_get_list_posts() {
    global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
    $args = array(
        'post_type' => 'post',
        'orderby' => 'date',
		'order' => 'DESC',
		'paged' => $paged
    );
	$wp_query->query( $args );
    return new WP_Query( $args );
}
endif; 

if ( ! function_exists( 'kage_get_list_services' ) ) :
function kage_get_list_services($n) {
    global $wp_query;
    $args = array(
        'post_type' => 'service',
        'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => $n
    );
	$wp_query->query( $args );
    return new WP_Query( $args );
}
endif; 

if ( ! function_exists( 'kage_get_list_works' ) ) :
function kage_get_list_works() {
    global $wp_query;
    $args = array(
        'post_type' => 'work',
        'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1
    );
	$wp_query->query( $args );
    return new WP_Query( $args );
}
endif; 

if ( ! function_exists( 'kage_get_list_testimonials' ) ) :
function kage_get_list_testimonials() {
    global $wp_query;
    $args = array(
        'post_type' => 'testimonial',
        'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1
    );
	$wp_query->query( $args );
    return new WP_Query( $args );
}
endif; 


if ( ! function_exists( 'service_register' ) ) :
function service_register() {
	$labels = array(
		'name' => _x( "Services", "post type general name", "kage" ),
		'singular_name' => _x( "Service Item", "post type singular name", "kage" ),
		'add_new' => _x( "Add Service", "add post type item", "kage" ),
		'add_new_item' => __( "Add New Service Item", "kage" ),
		'edit_item' => __( "Edit Service Item", "kage" ),
		'new_item' => __( "New Service Item", "kage" ),
		'view_item' => __( "View Service Item", "kage" ),
		'search_items' => __( "Search Services", "kage" ),
		'not_found' =>  __( "Nothing found", "kage" ),
		'not_found_in_trash' => __( "Nothing found in Trash", "kage" ),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 24,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,	
		'supports' => array( 'title', 'editor', 'thumbnail' )
	  ); 
	register_post_type( 'service' , $args );
	flush_rewrite_rules();
}
endif; 
add_action( 'init', 'service_register' );

if ( ! function_exists( 'work_register' ) ) :
function work_register() {
	$labels = array(
		'name' => _x( "Works", "post type general name", "kage" ),
		'singular_name' => _x( "Work Item", "post type singular name", "kage" ),
		'add_new' => _x( "Add Work", "add post type item", "kage" ),
		'add_new_item' => __( "Add New Work Item", "kage" ),
		'edit_item' => __( "Edit Work Item", "kage" ),
		'new_item' => __( "New Work Item", "kage" ),
		'view_item' => __( "View Work Item", "kage" ),
		'search_items' => __( "Search Works", "kage" ),
		'not_found' =>  __( "Nothing found", "kage" ),
		'not_found_in_trash' => __( "Nothing found in Trash", "kage" ),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 24,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,	
		'supports' => array( 'title', 'editor', 'thumbnail' )
	  ); 
	register_post_type( 'work' , $args );
	flush_rewrite_rules();
}
endif; 
add_action( 'init', 'work_register' );

if ( ! function_exists( 'testimonial_register' ) ) :
function testimonial_register() {
	$labels = array(
		'name' => _x( "Testimonials", "post type general name", "kage" ),
		'singular_name' => _x( "Testimonial Item", "post type singular name", "kage" ),
		'add_new' => _x( "Add Testimonial", "add post type item", "kage" ),
		'add_new_item' => __( "Add New Testimonial Item", "kage" ),
		'edit_item' => __( "Edit Testimonial Item", "kage" ),
		'new_item' => __( "New Testimonial Item", "kage" ),
		'view_item' => __( "View Testimonial Item", "kage" ),
		'search_items' => __( "Search Testimonials", "kage" ),
		'not_found' =>  __( "Nothing found", "kage" ),
		'not_found_in_trash' => __( "Nothing found in Trash", "kage" ),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 24,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,	
		'supports' => array( 'title', 'editor', 'thumbnail' )
	  ); 
	register_post_type( 'testimonial' , $args );
	flush_rewrite_rules();
}
endif; 
add_action( 'init', 'testimonial_register' );

if ( ! function_exists( 'kage_paginate_page' ) ) :
function kage_paginate_page() {
	wp_link_pages( array( 'before' => '<div class="pagination">', 'after' => '</div><div class="clear"></div>', 'link_before' => '<span class="current_pag">','link_after' => '</span>' ) );
}
endif; 

if (!function_exists( 'kage_of_analytics' ) ) :
function kage_of_analytics(){
	$analytics_code= of_get_option('analytics_code');
	echo '<script>'.stripslashes($analytics_code).'</script>';
}
endif; 
add_action( 'wp_footer', 'kage_of_analytics' );
?>