<?php
/**
 * Template hooks for this theme.
 *
 * @package Book_Landing_Page
 */
 
/**
 * Doctype
 * 
 * @see book_landing_page_doctype_cb
 */
add_action( 'book_landing_page_doctype', 'book_landing_page_doctype_cb' );

/**
 * Before wp_head
 * 
 * @see book_landing_page_head
  */
add_action( 'book_landing_page_before_wp_head', 'book_landing_page_head' );

/**
 * Before Header
 * 
 * @see book_landing_page_page_start - 20
*/
add_action( 'book_landing_page_before_header', 'book_landing_page_page_start', 20 );

/**
 * book_landing_page Header
 * 
 * @see book_landing_page_header_cb  - 20
 */
add_action( 'book_landing_page_header', 'book_landing_page_header_cb', 20 );

/**
 * Before Content
 * 
 * @see book_landing_page_page_header - 20
*/
add_action( 'book_landing_page_before_content', 'book_landing_page_page_header', 20 );

/**
 * BreadCrumb
 * 
 * @see book_landing_page_breadcrumbs_cb 
*/
add_action( 'book_landing_page_breadcrumbs', 'book_landing_page_breadcrumbs_cb' );

/**
 * book_landing_page Content
 * 
 * @see book_landing_page_content_start
*/
add_action( 'book_landing_page_content', 'book_landing_page_content_start' );

/**
 * Before Page entry content
 * 
 * @see book_landing_page_page_content_image
*/
add_action( 'book_landing_page_before_page_entry_content', 'book_landing_page_page_content_image' );

/**
 * Before Post entry content
 * 
 * @see book_landing_page_post_content_image - 10
 * @see book_landing_page_post_entry_header  - 20
*/

add_action( 'book_landing_page_before_post_entry_content', 'book_landing_page_post_entry_header', 10 );
add_action( 'book_landing_page_before_post_entry_content', 'book_landing_page_post_content_image', 20 );

/**
 * Before Search entry summary
 * 
 * @see book_landing_page_post_entry_header - 10
 * @see book_landing_page_post_content_image  - 20
*/
add_action( 'book_landing_page_before_search_entry_summary', 'book_landing_page_post_entry_header', 10 );
add_action( 'book_landing_page_before_search_entry_summary', 'book_landing_page_post_content_image', 20 );

/**
 * After post content
 * 
 * @see book_landing_page_post_author  - 10
*/
add_action( 'book_landing_page_after_post_content', 'book_landing_page_post_author', 10 );

/**
 * book_landing_page Comment
 * 
 * @see book_landing_page_get_comment_section 
*/
add_action( 'book_landing_page_comment', 'book_landing_page_get_comment_section' );

/**
 * After Content
 * 
 * @see book_landing_page_content_end - 20
*/
add_action( 'book_landing_page_after_content', 'book_landing_page_content_end', 20 );


/**
 * Book Landing Page Footer
 * 
 * @see book_landing_page_footer_start  - 20
 * @see book_landing_page_footer_menu   - 30
 * @see book_landing_page_footer_credit - 40
 * @see book_landing_page_footer_end    - 50
*/
add_action( 'book_landing_page_footer', 'book_landing_page_footer_start', 20 );
add_action( 'book_landing_page_footer', 'book_landing_page_footer_menu', 30 );
add_action( 'book_landing_page_footer', 'book_landing_page_footer_credit', 40 );
add_action( 'book_landing_page_footer', 'book_landing_page_footer_end', 50 );

/**
 * After Footer
 * 
 * @see book_landing_page_page_end - 20
*/
add_action( 'book_landing_page_after_footer', 'book_landing_page_page_end', 20 );