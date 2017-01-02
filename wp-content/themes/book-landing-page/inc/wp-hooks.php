<?php
/**
 * WP hooks for this theme.
 *
 * @package Book_Landing_Page
 */

/**
 * @see book_landing_page_setup
*/
add_action( 'after_setup_theme', 'book_landing_page_setup' );

/**
 * @see book_landing_page_content_width
*/
add_action( 'after_setup_theme', 'book_landing_page_content_width', 0 );

/**
 * @see book_landing_page_template_redirect_content_width
*/
add_action( 'template_redirect', 'book_landing_page_template_redirect_content_width' );

/**
 * @see book_landing_page_scripts 
*/
add_action( 'wp_enqueue_scripts', 'book_landing_page_scripts' );

/**
 * @see book_landing_page_category_transient_flusher
*/
add_action( 'edit_category', 'book_landing_page_category_transient_flusher' );
add_action( 'save_post',     'book_landing_page_category_transient_flusher' );

/**
 * 
 * @see book_landing_page_body_classes
*/
add_filter( 'body_class', 'book_landing_page_body_classes' );

/**
 * Move comment field to the bottm
 * @see book_landing_page_move_comment_field_to_bottom
*/
add_filter( 'comment_form_fields', 'book_landing_page_move_comment_field_to_bottom' );

/**
 * Custom CSS
 * @see book_landing_page_custom_css
*/
add_action( 'wp_head', 'book_landing_page_custom_css', 100 );

/**
 * @see book_landing_page_excerpt_more
 * @see book_landing_page_excerpt_length
*/
add_filter( 'excerpt_more', 'book_landing_page_excerpt_more' );
add_filter( 'excerpt_length', 'book_landing_page_excerpt_length', 999 );


/**
 * @see book_landing_page_change_comment_form_default_fields
 * @see book_landing_page_change_comment_form_defaults
*/
add_filter( 'comment_form_default_fields', 'book_landing_page_change_comment_form_default_fields' );
add_filter( 'comment_form_defaults', 'book_landing_page_change_comment_form_defaults' );