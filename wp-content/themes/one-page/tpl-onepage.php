<?php
/**
 * Template Name: One Page
 */
get_header();
?>
<!--Including sliders section -->
<?php echo get_template_part('templates/homepage', 'sliders'); ?>
<!--/Including sliders section -->
<?php
onepage_section_show();
get_footer();
