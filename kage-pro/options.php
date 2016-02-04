<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$fontsSeraliazed = file_get_contents(dirname( __FILE__ ) . '/inc/options-fonts.php');
	$fontArray = unserialize($fontsSeraliazed);	
	$faces_options = array();	

	$faces_options["Roboto|font-family: 'Roboto';"] = 'Roboto';
	$faces_options["Roboto Condensed|font-family: 'Roboto Condensed';"] = 'Roboto Condensed';
	$faces_options["Droid Sans|font-family: 'Droid Sans';"] = 'Droid Sans';
	$faces_options["Open Sans|font-family: 'Open Sans';"] = 'Open Sans';

	$i=0;
	foreach($fontArray as $v)	{
	$i++;
	   $faces_options[$v['css-name'].'|'.$v['font-family']] = $v['font-name'];
	}
	
	// Typography Options
	$typography_options = array(
		'faces' => $faces_options
	);
	
	// If using image radio buttons, define a directory path
	$set_year = date('Y');
	$options = array();

	/* General Settings */	
	
	$options[] = array(
		'name' => __('General Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Header Logo Text', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_logo_text1',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Header Logo Text 2', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_logo_text2',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Header Logo Image', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'logo_image',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Fav Icon URL', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'fav_icon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Web Clip Icon URL', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'web_clip',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Header Phone', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_phone',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Header Email', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_email',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Footer copyright text left', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_text_left',
		'std' => 'Copyright &copy; '.$set_year.' '.get_bloginfo('name'),
		'type' => 'text');
			
	$options[] = array(
		'name' => __('Enter your custom CSS styles.', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'custom_css_styles',
		'std' => '',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Footer text right', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_text_right',
		'std' => 'Theme created by <a href="http://www.pwtthemes.com/">PWT</a>. Powered by <a href="http://wordpress.org/">WordPress.org</a>',
		'type' => 'textarea');		

	$options[] = array(
		'name' => __('Home Page', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Slider Shortcode', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'slider_shotcode',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Top Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_title',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Blue Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'blue_title',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Blue Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'blue_content',
		'std' => '',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Blue Button Text', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'blue_button_text',
		'std' => 'Click Here',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Blue Button Link', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'blue_button_link',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Welcome Image', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'welcome_image',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Welcome Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'welcome_title',
		'std' => '',
		'type' => 'text');			

	$options[] = array(
		'name' => __('Welcome Title 2', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'welcome_title2',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Welcome Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'welcome_content',
		'std' => '',
		'type' => 'textarea');			

	$options[] = array(
		'name' => __('Welcome Button Text', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'welcome_button_text',
		'std' => 'Read More',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Welcome Button Link', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'welcome_button_link',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Title Area 2', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'title_area_2',
		'std' => 'Portfolio',
		'type' => 'text');			

			$options[] = array(
		'name' => __('Contact Page', 'options_framework_theme'),
		'type' => 'heading');		

	$options[] = array(
		'name' => __('Shortcode Map', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'shortcode_map',
		'std' => '[gmap width="100%" height="300" address="San Diego"]',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Information Box Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'information_box_title',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Information Box Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'information_box_content',
		'std' => '',
		'type' => 'textarea');	
		
		
    /* Social Links */		
		
	$options[] = array(
		'name' => __('Social', 'options_framework_theme'),
		'type' => 'heading');		

	$options[] = array(
		'name' => __('Rss', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_rss',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Deviantart', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_deviantart',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Digg', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_digg',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Facebook', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_facebook',
		'std' => 'http://www.facebook.com',
		'type' => 'text');
	$options[] = array(
		'name' => __('Flickr', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_flickr',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Google', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_googleplus',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Linkedin', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_linkedin',
		'std' => 'http://www.linkedin.com',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Myspace', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_myspace',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'name' => __('Tumblr', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_tumblr',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_twitter',
		'std' => 'http://www.twitter.com',
		'type' => 'text');
	$options[] = array(
		'name' => __('Vimeo', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_vimeo',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Youtube', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_youtube',
		'std' => 'http://www.youtube.com',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('Dribbble', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_dribbble',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Pinterest', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_pinterest',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Skype', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_skype',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Stumbleupon', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_stumbleupon',
		'std' => '',
		'type' => 'text');
		
    /* Webmaster Tools */	
		
	$options[] = array(
		'name' => __('Webmaster Tools', 'options_framework_theme'),
		'type' => 'heading');		

	$options[] = array(
		'name' => __('Google Site Verification ID', 'options_framework_theme'),
		'desc' => __('Enter your Google ID', 'options_framework_theme'),
		'id' => 'google_site_verification',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Yahoo Site Verification ID', 'options_framework_theme'),
		'desc' => __('Enter your Yahoo ID', 'options_framework_theme'),
		'id' => 'yahoo_site_verification',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Bing Site Verification ID', 'options_framework_theme'),
		'desc' => __('Enter your Bing ID', 'options_framework_theme'),
		'id' => 'bing_site_verification',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Analytics Code to display on Footer', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'analytics_code',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Fonts', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array( 'name' => __('Body', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "body_font",
		'std' => array('size' => '14px', 'face' => "Roboto|font-family: 'Roboto', Arial, sans-serif;", 'style' => 'normal', 'color' => '#616161' ),
		'type' => 'typography',
		'options' => $typography_options);
		
	$options[] = array( 'name' => __('Menu', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "menu_font",
		'std' => array('size' => '15px', 'face' => "Droid Sans|font-family: 'Droid Sans';", 'style' => 'normal', 'color' => '#616161' ),
		'type' => 'typography',
		'options' => $typography_options);		
		
	$options[] = array( 'name' => __('Logo', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "logo_font",
		'std' => array('size' => '40px', 'face' => "Roboto Condensed|font-family: 'Roboto Condensed', Arial, sans-serif;", 'style' => 'bold' ),
		'type' => 'typography',
		'options' => $typography_options);
		
	$options[] = array( 'name' => __('Title Page', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "title_page",
		'std' => array('size' => '28px', 'face' => "Roboto|font-family: 'Roboto', Arial, sans-serif;", 'style' => 'normal', 'color' => '#ffffff' ),
		'type' => 'typography',
		'options' => $typography_options);	

	$options[] = array( 'name' => __('Title Blog', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "title_blog",
		'std' => array('size' => '24px', 'face' => "Open Sans|font-family: 'Open Sans', Arial, sans-serif;", 'style' => 'normal', 'color' => '#3C3C3C' ), 
		'type' => 'typography',
		'options' => $typography_options);			

	$options[] = array( 'name' => __('Title Widgets', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "title_widgets",
		'std' => array('size' => '19px', 'face' => "Open Sans|font-family: 'Open Sans';", 'style' => 'normal', 'color' => '#616161' ),
		'type' => 'typography',
		'options' => $typography_options);		

	$options[] = array( 'name' => __('Title Widgets Footer', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "title_widgets_footer",
		'std' => array('size' => '21px', 'face' => "Roboto|font-family: 'Roboto';", 'style' => 'normal', 'color' => '#5FC5FF' ),
		'type' => 'typography',
		'options' => $typography_options);	

	$options[] = array(
		'name' => __('Colors', 'options_framework_theme'),
		'type' => 'heading');	

	$options[] = array(
		'name' => __('General Color', 'options_framework_theme'),
		'desc' => __('Selected by default #42ADEA.', 'options_framework_theme'),
		'id' => 'general_color',
		'std' => '#42ADEA',
		'type' => 'color' 
	);	
	$options[] = array(
		'name' => __('Header Background', 'options_framework_theme'),
		'desc' => __('Selected by default #EBEBEB.', 'options_framework_theme'),
		'id' => 'header_background',
		'std' => '#EBEBEB',
		'type' => 'color' 
	);	
	$options[] = array(
		'name' => __('Title Background', 'options_framework_theme'),
		'desc' => __('Selected by default #53BAF5.', 'options_framework_theme'),
		'id' => 'title_background',
		'std' => '#53BAF5',
		'type' => 'color' 
	);		
	$options[] = array(
		'name' => __('Footer Background', 'options_framework_theme'),
		'desc' => __('Selected by default #2B2B2B.', 'options_framework_theme'),
		'id' => 'footer_backgorund',
		'std' => '#2B2B2B',
		'type' => 'color' 
	);	
	$options[] = array(
		'name' => __('Copyright Backgorund', 'options_framework_theme'),
		'desc' => __('Selected by default #53BAF5.', 'options_framework_theme'),
		'id' => 'copyright_backgorund',
		'std' => '#53BAF5',
		'type' => 'color' 
	);		
		
	return $options;
}