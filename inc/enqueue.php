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
		$theme_version  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? KARYAWP_VERSION : KARYAWP_VERSION.'.'.time() ;

		wp_enqueue_style( 'karyawp-styles', get_template_directory_uri() . '/assets/karyawp.css', array(), $theme_version );

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'karyawp-scripts', get_template_directory_uri() . '/assets/karyawp.js', array(), $theme_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
    }
}