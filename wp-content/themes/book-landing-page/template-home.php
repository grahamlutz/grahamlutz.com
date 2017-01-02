<?php
/**
 * Template Name: Home Page
 *
 * @package Book_Landing_Page
 */
get_header(); 
    
    global $book_landing_page_sections;
    
    foreach( $book_landing_page_sections as $section ){ 
           if( get_theme_mod( 'book_landing_page_ed_' . $section . '_section' ) == 1 ){
            get_template_part( 'sections/' . esc_attr( $section ) );
        } 
    }
get_footer(); 
