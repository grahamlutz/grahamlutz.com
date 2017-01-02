jQuery(document).ready(function($) {
	/* Move widgets to their respective sections */

	if( true == book_landing_page_data.newsletter ){
		wp.customize.section( 'sidebar-widgets-bottom-widget' ).panel( 'book_landing_page_home_page_settings' )
		wp.customize.section( 'sidebar-widgets-bottom-widget' ).priority( '51' );
    }

});