<?php
function loads_scripts(){
    wp_enqueue_script( 'vendors_js', get_template_directory_uri() . '/js/vendors.min.js', array(), time(), true );
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.min.js', array('jquery'), time(), true );
}
add_action( 'wp_enqueue_scripts', 'loads_scripts' );

function loads_styles(){
    wp_enqueue_style( 'vendors_css', get_template_directory_uri() . '/css/vendors.min.css', array(), time() );
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/styles.min.css', array('vendors_css'), time() );
}
add_action( 'wp_enqueue_scripts', 'loads_styles' );
