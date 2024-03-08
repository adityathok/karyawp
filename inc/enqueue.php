<?php
/**
 * Theme enqueue scripts
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'karyawp_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
    add_action( 'wp_enqueue_scripts', 'karyawp_scripts' );
	function karyawp_scripts() {

		// Get the theme version.
		$theme_version  = defined( 'KARYAWP_VERSION' ) ? KARYAWP_VERSION : wp_get_theme()->get( 'Version' ) ;

		wp_enqueue_style( 'karyawp', get_template_directory_uri() . '/assets/css/theme.css', array(), $theme_version );

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'lazysizes', get_template_directory_uri() . '/assets/js/lazysizes.min.js', array('jquery'), $theme_version, true );
		wp_enqueue_script( 'karyawp', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), $theme_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
    }
}