<?php 

function fso_enqueue_scripts() {
    // Add bootstrap, fontawsome, css, js and more
        wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'); 
        wp_enqueue_style('fontawesome_css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('style', get_stylesheet_uri());
        wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ));

    if ( !is_admin() ) {  
        wp_deregister_script('jquery');  
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, '1.11.0', true );  

        wp_enqueue_script('jquery');  
    }  
}
add_action( 'wp_enqueue_scripts', 'fso_enqueue_scripts' );


function fso_setup() {  
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' ); 
    // Register navigation menu
    register_nav_menu( 'primary', __( 'Primary Menu', 'primarymenu' ) );
    // Disable standard wordpress intern gallery style (inline)
    add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'fso_setup' );

/*
 * Hide WP Version
 */
function no_generator() { return ''; }
add_filter( 'the_generator', 'no_generator' );