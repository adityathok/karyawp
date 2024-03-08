<?php
/**
 * Custom template tags for this theme
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'karyawp_body_attributes' ) ) {
	/**
	 * Displays the attributes for the body element.
	 */
	function karyawp_body_attributes() {
		/**
		 * Filters the body attributes.
		 *
		 * @param array $atts An associative array of attributes.
		 */
		$atts = array_unique( apply_filters( 'karyawp_body_attributes', $atts = array() ) );
		if ( ! is_array( $atts ) || empty( $atts ) ) {
			return;
		}
		$attributes = '';
		foreach ( $atts as $name => $value ) {
			if ( $value ) {
				$attributes .= sanitize_key( $name ) . '="' . esc_attr( $value ) . '" ';
			} else {
				$attributes .= sanitize_key( $name ) . ' ';
			}
		}
		echo trim( $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
}

if (!function_exists('karyawp_data_bs_theme')) {
	/**
	 * Bootstrap color mode / dark mode
	 */
	function karyawp_data_bs_theme($atts) {
		$cookie_name 	= "data_bs_theme";
		$colormode		= isset($_COOKIE[$cookie_name]) ? $_COOKIE[$cookie_name] : 'light';
		$colormode		= $colormode == 'dark' ? 'dark' : 'light';
		$atts['data-bs-theme'] = $colormode;
		return $atts;
	}
	add_filter( 'karyawp_body_attributes', 'karyawp_data_bs_theme' );
}

if ( ! function_exists( 'karyawp_container_type' ) ) {
	/**
	 * Prints HTML class for type container.
	 */
	function karyawp_container_type($layout = null) {
		$container = get_theme_mod('karyawp_container_type', 'container');
	
		$container = apply_filters('karyawp_container_type', $container);
	 
		return $container.' px-4';
	}
}

if ( ! function_exists( 'karyawp_sidebar_position' ) ) {
	/**
	 * Options for sidebar position
	 */
	function karyawp_sidebar_position($layout = null) {

		// Customizer
		$sidebar_position = get_theme_mod( 'karyawp_sidebar_position', 'right' );
			
		//is page
		if(is_page()) {
			// page template
			if (
				is_page_template(
					array(
						'page-templates/empty.php',
						'page-templates/canvas.php',
					)
				)
			) {
				$sidebar_position = 'disable';
			}

			$sidebar_page = get_post_meta(get_the_ID(),'karyawp_sidebar_position',true);
			if($sidebar_page){
				$sidebar_position = $sidebar_page;
			}

		}

		$sidebar_position = apply_filters( 'karyawp_sidebar_position', $sidebar_position );

		return $sidebar_position;
	}
}

if ( ! function_exists( 'karyawp_header_attributes' ) ) {
	/**
	 * Displays the attributes for the header element.
	 */
	function karyawp_header_attributes() {
		/**
		 * Filters the header attributes.
		 *
		 * @param array $atts An associative array of attributes.
		 */
		$atts = array_unique( apply_filters( 'karyawp_header_attributes', $atts = array() ) );

		if ( ! is_array( $atts ) || empty( $atts ) ) {
			$atts = array();
		}

		$atts['class'] 	= 'site-header';
		$atts['role']	= 'banner';

		$sticky = get_theme_mod( 'karyawp_header_sticky', true );
		if($sticky){
			$atts['class'] = $atts['class'].' sticky-top';
		}

		$overlay = get_theme_mod( 'karyawp_header_overlay', false );
		if(is_page()){
			$overlay = get_post_meta(get_the_ID(),'karyawp_header_overlay',true);
		}
		if($overlay){
			$atts['class'] = $atts['class'].' bg-overlay z-2';
		}

		$attributes = '';
		foreach ( $atts as $name => $value ) {
			if ( $value ) {
				$attributes .= sanitize_key( $name ) . '="' . esc_attr( $value ) . '" ';
			} else {
				$attributes .= sanitize_key( $name ) . ' ';
			}
		}
		echo trim( $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
}