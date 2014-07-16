<?php 

define( 'THEME_VERSION', 0.2 );


/**
 * Scripts
 */

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

function theme_scripts() {
  // We're loading jQuery in with the vendor.js, so stop WP from including it twice
  wp_deregister_script( 'jquery' );
  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/scripts/min/jquery.min.js', false, '1.11.0', false );

  // Enqueue the vendor scripts (jQuery, Foundation etc.)
  wp_enqueue_script( 'vendor-script', get_template_directory_uri() . '/assets/scripts/min/vendor.min.js', array( 'jquery' ), THEME_VERSION, true );

  // Enqueue home-specific js
  if ( is_home() || is_front_page() ) {
    wp_enqueue_script( 'home-script', get_template_directory_uri() . '/assets/scripts/min/home.min.js', array( 'vendor-script' ), THEME_VERSION, true );
  }

  // Enqueue other bespoke js
  wp_enqueue_script( 'core-script', get_template_directory_uri() . '/assets/scripts/min/core.min.js', array( 'vendor-script' ), THEME_VERSION, true );  
}


/**
 * Styles
 */

add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_styles() {
  wp_enqueue_style( 'core-style', get_stylesheet_uri(), false, THEME_VERSION );
}


/**
 * Page Title
 */

add_filter( 'wp_title', 'wp_title_filter', 10, 2 );

function wp_title_filter( $title, $sep ) {
  if ( is_feed() ) {
    return $title;
  }
  
  global $page, $paged;

  // Add the blog name
  $title .= get_bloginfo( 'name', 'display' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title .= " $sep $site_description";
  }

  // Add a page number if necessary:
  if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
    $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
  }

  return $title;
}

?>