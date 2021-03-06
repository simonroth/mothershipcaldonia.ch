<?php
/**
 * @package Mothership Caldonia
 */

if ( ! function_exists( 'mc_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function mc_setup() {
  // Let WordPress manage the document title.
  add_theme_support( 'title-tag' );

  // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' )
	) );
}
endif; // mc_setup
add_action( 'after_setup_theme', 'mc_setup' );

/**
 * Font URLs function.
 */
function mc_fonts_url() {
  $font_families[] = 'Oswald:700';
  $font_families[] = 'Open Sans:600,400';
  $font_families[] = 'PT Mono';

  $query_args = array(
    'family' => urlencode( implode( '|', $font_families ) ),
    'subset' => urlencode( 'latin' )
  );

  $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
  return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function mc_scripts() {
  wp_enqueue_style( 'mc-fonts', mc_fonts_url(), array(), null );

  wp_enqueue_style( 'mc-icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), null );

  wp_enqueue_style( 'mc-style', get_stylesheet_uri(), array(), null );

  wp_enqueue_script( 'mc-modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), null, true );

  wp_enqueue_script( 'mc-scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'mc_scripts' );

/*
 * Easter egg
 */
 function mc_easter_egg_route() {
   add_rewrite_rule( '^5', 'index.php?easter=egg', 'top' );
 }
 add_action( 'init', 'mc_easter_egg_route' );

 function mc_easter_egg_var( $vars ) {
   $vars[] = 'easter';
   return $vars;
 }
 add_filter( 'query_vars', 'mc_easter_egg_var' );
