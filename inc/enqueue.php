<?php
/**
 * Theme enqueue scripts
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'zahro_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
    add_action( 'wp_enqueue_scripts', 'zahro_scripts' );
	function zahro_scripts() {

		// Get the theme version.
		$theme_version  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? ZAHRO_VERSION : ZAHRO_VERSION.'.'.time() ;

		wp_enqueue_style( 'zahro-styles', get_template_directory_uri() . '/assets/zahro.css', array(), $theme_version );

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'zahro-scripts', get_template_directory_uri() . '/assets/zahro.js', array(), $theme_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
    }
}