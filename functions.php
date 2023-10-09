<?php
/**
 * Megla Plus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Razia Blog
 */

if ( ! defined( 'RAZIA_BLOG_VERSION' ) ) {
	$razia_blog_theme = wp_get_theme();
	define( 'RAZIA_BLOG_VERSION', $razia_blog_theme->get( 'Version' ) );
}

/**
 * Enqueue scripts and styles.
 */
function razia_blog_scripts() {
    wp_enqueue_style( 'razia-blog-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','razia-default-block','razia-style'), '', 'all');
    wp_enqueue_style( 'razia-blog-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), RAZIA_BLOG_VERSION, 'all');
}
add_action( 'wp_enqueue_scripts', 'razia_blog_scripts' );

/**
 * Custom excerpt length.
 */
function razia_blog_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 29;
}
add_filter( 'excerpt_length', 'razia_blog_excerpt_length', 999 );

/**
 * Custom excerpt More.
 */
function razia_blog_excerpt_more( $more ) {
    if ( is_admin() ) return $more;
    return '.';
}
add_filter( 'excerpt_more', 'razia_blog_excerpt_more' );