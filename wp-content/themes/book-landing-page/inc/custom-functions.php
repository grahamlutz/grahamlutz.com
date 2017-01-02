<?php
/**
 * Book Landing Page functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Book_Landing_page
 */

if ( ! function_exists( 'book_landing_page_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function book_landing_page_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Book Landing Page, use a find and replace
	 * to change 'book-landing-page' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'book-landing-page', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'book-landing-page' ),
		'secondary' => esc_html__( 'Footer Menu', 'book-landing-page' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
        'status',
        'audio', 
        'chat'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'book_landing_page_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Custom Image Size
    add_image_size( 'book-landing-page-with-sidebar', 750, 500, true );
    add_image_size( 'book-landing-page-without-sidebar', 1110, 500, true );
    add_image_size( 'book-landing-page-featured-post', 337, 226, true );
    add_image_size( 'book-landing-page-recent-post', 70, 70, true );
    add_image_size( 'book-landing-page-banner-image', 380, 582, true );
    add_image_size( 'book-landing-page-about-block', 555, 330, true );
    add_image_size( 'book-landing-page-review-block', 630, 366, true );


    /* Custom Logo */
    add_theme_support( 'custom-logo', array(    	
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );
}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function book_landing_page_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'book_landing_page_content_width', 750 );
}


/**
* Adjust content_width value according to template.
*
* @return void
*/
function book_landing_page_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = book_landing_page_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1140;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1140;
	}

}


/**
 * Enqueue scripts and styles.
 */
function book_landing_page_scripts() {

	$query_args = array(
		'family' => 'PT+Sans:400,400italic,700',
		);

    wp_enqueue_style( 'jquery-sidr-light', get_template_directory_uri() . '/css/jquery.sidr.light.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
    wp_enqueue_style( 'book-landing-page-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
    wp_enqueue_style( 'book-landing-page-style', get_stylesheet_uri(), array(), BOOK_LANDING_PAGE_THEME_VERSION );

    wp_register_script( 'book-landing-page-ajax', get_template_directory_uri() . '/js/ajax.js', array('jquery'), BOOK_LANDING_PAGE_THEME_VERSION, true );
    wp_enqueue_script( 'nice-scroll', get_template_directory_uri() . '/js/nice-scroll.js', array('jquery'), '3.6.6', true );
    wp_enqueue_script( 'jquery-equalheights', get_template_directory_uri() . '/js/jquery.equalheights.js', array('jquery'), '1.5.1', true );
    wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array('jquery'), '2.2.1', true );
    wp_enqueue_script( 'book-landing-page-custom', get_template_directory_uri() . '/js/custom.js', BOOK_LANDING_PAGE_THEME_VERSION, true );

	wp_enqueue_script( 'book-landing-page-ajax' );
    
    wp_localize_script( 
        'book-landing-page-ajax', 
        'book_landing_page_ajax',
        array(
            'url' => admin_url( 'admin-ajax.php' ),            
         )
    ); 


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}



/**
 * Flush out the transients used in book_landing_page_categorized_blog.
 */
function book_landing_page_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'book_landing_page_categories' );
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function book_landing_page_body_classes( $classes ) {
  global $post;

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
		$classes[] = 'custom-background-color';
	}

    if( !( is_active_sidebar( 'right-sidebar' )) || is_page_template( 'template-home.php' ) || is_404() ) {
        $classes[] = 'full-width'; 
    }
    
    if(is_page()){
        $book_landing_page_post_class = book_landing_page_sidebar_layout(); 
        if( $book_landing_page_post_class == 'no-sidebar' )
        $classes[] = 'full-width';
    }

	return $classes;
}


/** 
 * Hook to move comment text field to the bottom in WP 4.4 
 *
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/  
 */
function book_landing_page_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

/**
 * Sanitize Custom CSS
*/
function book_landing_page_custom_css(){
    $custom_css = get_theme_mod( 'book_landing_page_custom_css' );
    if( !empty( $custom_css ) ){
		echo '<style type="text/css">';
		echo wp_strip_all_tags( $custom_css );
		echo '</style>';
	}
}

if ( ! function_exists( 'book_landing_page_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function book_landing_page_excerpt_more() {
  	return ' &hellip; ';
}
endif;

if ( ! function_exists( 'book_landing_page_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function book_landing_page_excerpt_length( $length ) {
    return 45;
}
endif;



if( ! function_exists( 'book_landing_page_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function book_landing_page_change_comment_form_default_fields( $fields ){
    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'book-landing-page' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'book-landing-page' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'book-landing-page' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;
    
}
endif;

if( ! function_exists( 'book_landing_page_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function book_landing_page_change_comment_form_defaults( $defaults ){
    
    // Change the "cancel" to "I would rather not comment" and use a span instead
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'book-landing-page' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    $defaults['label_submit'] = esc_attr__( 'Submit', 'book-landing-page' );
    
    return $defaults;
    
}
endif;
  

  