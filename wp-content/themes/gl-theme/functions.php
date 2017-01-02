<?php

// Queue parent style followed by child/customized style
add_action( 'wp_enqueue_scripts', 'func_enqueue_child_styles', 99);

function func_enqueue_child_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_dequeue_style('dazzling-style');
    wp_enqueue_style( 'dazzling-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
