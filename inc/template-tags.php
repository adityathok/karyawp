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

if ( ! function_exists( 'karyawp_entry_meta' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function karyawp_entry_meta() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: inherit;" width="11" height="11" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16"> <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/> <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/> </svg> %2$s</time>';
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$post_date = apply_filters(
			'karyawp_entry_meta_date',
			sprintf(
				'<span class="post-meta-date">%1$s</span>',
				apply_filters( 'karyawp_posted_on_time', $time_string )
			)
		);
		$post_author = apply_filters(
			'karyawp_entry_meta_author',
			sprintf(
				'<span class="post-meta-author"> %1$s<span class="author vcard"> <a class="url fn n" href="%2$s">%3$s</a></span></span>',
				'<svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: inherit;" width="11" height="11" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"> <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/> <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/> </svg>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			$post_comments = '<span class="post-meta-comments">';
			$post_comments .= sprintf(
				'%1$s <a class="url fn n" href="%2$s">%3$s</a>',
				'<svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: inherit;" width="11" height="11" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16"> <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/> </svg>',
				esc_url( get_the_permalink().'#comments' ),
				get_comments_number()
			);
			$post_comments .= '</span>';
		}

		$post_meta = [$post_date,$post_author,$post_comments];

		$post_meta_separator = apply_filters(
			'karyawp_entry_meta_separator',
			sprintf(
				'<span class="post-meta-separator px-2">·</span>',
			)
		);

		echo '<span class="karyawp_entry_meta">'.implode($post_meta_separator,$post_meta).'</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}