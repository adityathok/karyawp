<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'zahro_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function zahro_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
    add_filter( 'body_class', 'zahro_body_classes' );
}

if ( ! function_exists( 'zahro_change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return string
	 */
	function zahro_change_logo_class( $html ) {

		$html = str_replace( 'class="custom-logo"', 'class="img-fluid"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );
		$html = str_replace( 'alt=""', 'title="Home" alt="logo"', $html );

		return $html;
	}
    add_filter( 'get_custom_logo', 'zahro_change_logo_class' );
}

if ( ! function_exists( 'zahro_pingback' ) ) {
	/**
	 * Add a pingback url auto-discovery header for single posts of any post type.
	 */
	function zahro_pingback() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="' . esc_url( get_bloginfo( 'pingback_url' ) ) . '">' . "\n";
		}
	}
    add_action( 'wp_head', 'zahro_pingback' );
}

if ( ! function_exists( 'zahro_mobile_web_app_meta' ) ) {
	/**
	 * Add mobile-web-app meta.
	 */
	function zahro_mobile_web_app_meta() {
		echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-title" content="' . esc_attr( get_bloginfo( 'name' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '">' . "\n";
	}
    add_action( 'wp_head', 'zahro_mobile_web_app_meta' );
}

if ( ! function_exists( 'zahro_default_body_attributes' ) ) {
	/**
	 * Adds schema markup to the body element.
	 *
	 * @param array $atts An associative array of attributes.
	 * @return array
	 */
	function zahro_default_body_attributes( $atts ) {
		$atts['itemscope'] = '';
		$atts['itemtype']  = 'http://schema.org/WebSite';
		return $atts;
	}
    add_filter( 'zahro_body_attributes', 'zahro_default_body_attributes' );
}

if ( ! function_exists( 'zahro_escape_the_archive_description' ) ) {
	/**
	 * Escapes the description for an author or post type archive.
	 *
	 * @param string $description Archive description.
	 * @return string Maybe escaped $description.
	 */
	function zahro_escape_the_archive_description( $description ) {
		if ( is_author() || is_post_type_archive() ) {
			return wp_kses_post( $description );
		}

		/** 
		 * All other descriptions are retrieved via term_description() which returns
		 * a sanitized description.
		 */
		return $description;
	}
    add_filter( 'get_the_archive_description', 'zahro_escape_the_archive_description' );
} 

if ( ! function_exists( 'zahro_kses_title' ) ) {
	/**
	 * Sanitizes data for allowed HTML tags for post title.
	 *
	 * @param string $data Post title to filter.
	 * @return string Filtered post title with allowed HTML tags and attributes intact.
	 */
	function zahro_kses_title( $data ) {
		// Tags not supported in HTML5 are not allowed.
		$allowed_tags = array(
			'abbr'             => array(),
			'aria-describedby' => true,
			'aria-details'     => true,
			'aria-label'       => true,
			'aria-labelledby'  => true,
			'aria-hidden'      => true,
			'b'                => array(),
			'bdo'              => array(
				'dir' => true,
			),
			'blockquote'       => array(
				'cite'     => true,
				'lang'     => true,
				'xml:lang' => true,
			),
			'cite'             => array(
				'dir'  => true,
				'lang' => true,
			),
			'dfn'              => array(),
			'em'               => array(),
			'i'                => array(
				'aria-describedby' => true,
				'aria-details'     => true,
				'aria-label'       => true,
				'aria-labelledby'  => true,
				'aria-hidden'      => true,
				'class'            => true,
			),
			'code'             => array(),
			'del'              => array(
				'datetime' => true,
			),
			'img'              => array(
				'src'    => true,
				'alt'    => true,
				'width'  => true,
				'height' => true,
				'class'  => true,
				'style'  => true,
			),
			'ins'              => array(
				'datetime' => true,
				'cite'     => true,
			),
			'kbd'              => array(),
			'mark'             => array(),
			'pre'              => array(
				'width' => true,
			),
			'q'                => array(
				'cite' => true,
			),
			's'                => array(),
			'samp'             => array(),
			'span'             => array(
				'dir'      => true,
				'align'    => true,
				'lang'     => true,
				'xml:lang' => true,
			),
			'small'            => array(),
			'strong'           => array(),
			'sub'              => array(),
			'sup'              => array(),
			'u'                => array(),
			'var'              => array(),
		);
		$allowed_tags = apply_filters( 'zahro_kses_title', $allowed_tags );

		return wp_kses( $data, $allowed_tags );
	}
    
    // Escapes all occurances of 'the_title()' and 'get_the_title()'.
    add_filter( 'the_title', 'zahro_kses_title' );

    // Escapes all occurances of 'the_archive_title' and 'get_the_archive_title()'.
    add_filter( 'get_the_archive_title', 'zahro_kses_title' );

} 

if ( ! function_exists( 'zahro_hide_posted_by' ) ) {
	/**
	 * Hides the posted by markup in `zahro_posted_on()`.
	 *
	 * @param string $byline Posted by HTML markup.
	 * @return string Maybe filtered posted by HTML markup.
	 */
	function zahro_hide_posted_by( $byline ) {
		if ( is_author() ) {
			return '';
		}
		return $byline;
	}
    add_filter( 'zahro_posted_by', 'zahro_hide_posted_by' );
}

if ( ! function_exists( 'zahro_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function zahro_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
    add_filter( 'excerpt_more', 'zahro_custom_excerpt_more' );
}

///remove category title prefix
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );
