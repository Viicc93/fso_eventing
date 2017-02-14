<?php
require_once('wp_bootstrap_navwalker.php');

include 'include/horse-list-widgets.php';

function fso_enqueue_scripts() {
  // Enqueue Scripts
  if ( !is_admin() ) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, '1.11.0', true );

    wp_enqueue_script('jquery');
  }
  wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ));
  wp_enqueue_script( 'scrollreveal', get_stylesheet_directory_uri() . '/js/scrollreveal.min.js', array( 'jquery' ));
  wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery', 'scrollreveal' ));
  //Enqueue Styles
  wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_enqueue_style('fontawesome_css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Oswald|Roboto');
  wp_enqueue_style('style', get_stylesheet_uri());
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

if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}

function fso_widgets_init() {

  register_sidebar( array(
    'name' => __( 'News Sidebar', 'fso-eventing' ),
    'id' => 'news-sidebar',
    'description' => __( 'Widget area.', 'fso-eventing' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s ">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name' => __( 'Horses Sidebar', 'fso-eventing' ),
    'id' => 'horses-sidebar',
    'description' => __( 'Widget area.', 'fso-eventing' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s ">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name' => __( 'Bottom Start Page', 'fso-eventing' ),
    'id' => 'bottom-start',
    'description' => __( 'Widget area.', 'fso-eventing' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s ">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name' => __( 'Footer', 'fso-eventing' ),
    'id' => 'footer-wigets',
    'description' => __( 'Widget area.', 'fso-eventing' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s ">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

}
add_action( 'widgets_init', 'fso_widgets_init' );


function fso_init() {
  // Create Custom Post Type for horses
  $labels = array(
    'name' =>  _x('Horses', 'Horses',  'fso-eventing'),
    'singular_name' =>  _x('Horse', 'Horse',  'fso-eventing'),
    'add_new' =>  __('Add New', 'fso-eventing'),
    'add_new_item' =>  __('Add New Horse', 'fso-eventing'),
    'edit_item' =>  __('Edit Horse', 'fso-eventing'),
  );

  $args = array(
    'label' => __('Horses', 'fso-eventing'),
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'query_var' => true,
    'menu_icon' => 'dashicons-carrot',
    'supports' => array(
        'title',
        'thumbnail',)
    );

  register_post_type( 'fso-horses', $args );

}
add_action( 'init', 'fso_init' );

/*
 * Hide WP Version
 */
function no_generator() { return ''; }
add_filter( 'the_generator', 'no_generator' );
