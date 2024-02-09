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

		$post_meta = [$post_date,$post_author];

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			$post_comments = '<span class="post-meta-comments">';
			$post_comments .= sprintf(
				'%1$s <a class="url fn n" href="%2$s">%3$s</a>',
				'<svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: inherit;" width="11" height="11" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16"> <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/> </svg>',
				esc_url( get_the_permalink().'#comments' ),
				get_comments_number()
			);
			$post_comments .= '</span>';

			array_push($post_meta,$post_comments);

		}

		$post_meta_separator = apply_filters(
			'karyawp_entry_meta_separator',
			sprintf(
				'<span class="post-meta-separator px-2">·</span>',
			)
		);

		echo '<span class="karyawp_entry_meta">'.implode($post_meta_separator,$post_meta).'</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}


if ( ! function_exists( 'karyawp_comment_navigation' ) ) {
	/**
	 * Displays the comment navigation.
	 *
	 * @param string $nav_id The ID of the comment navigation.
	 */
	function karyawp_comment_navigation( $nav_id ) {
		if ( get_comment_pages_count() <= 1 ) {
			// Return early if there are no comments to navigate through.
			return;
		}
		?>
		<nav class="comment-navigation" id="<?php echo esc_attr( $nav_id ); ?>">

			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wpzaro' ); ?></h1>

			<?php if ( get_previous_comments_link() ) { ?>
				<div class="nav-previous">
					<?php previous_comments_link( __( '&larr; Older Comments', 'wpzaro' ) ); ?>
				</div>
			<?php } ?>

			<?php if ( get_next_comments_link() ) { ?>
				<div class="nav-next">
					<?php next_comments_link( __( 'Newer Comments &rarr;', 'wpzaro' ) ); ?>
				</div>
			<?php } ?>

		</nav><!-- #<?php echo esc_attr( $nav_id ); ?> -->
		<?php
	}
}

if ( ! function_exists( 'karyawp_edit_post_link' ) ) {
	/**
	 * Displays the edit post link for post.
	 */
	function karyawp_edit_post_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'wpzaro' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
}

if ( ! function_exists( 'karyawp_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function karyawp_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="container navigation post-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'wpzaro' ); ?></h2>
			<div class="d-flex nav-links justify-content-between">
				<?php
				if ( get_previous_post_link() ) {
					previous_post_link( '<span class="nav-previous">%link</span>', _x( '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/> </svg>&nbsp;%title', 'Previous post link', 'wpzaro' ) );
				}
				if ( get_next_post_link() ) {
					next_post_link( '<span class="nav-next">%link</span>', _x( '%title&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/> </svg>', 'Next post link', 'wpzaro' ) );
				}
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
}

if ( ! function_exists( 'karyawp_link_pages' ) ) {
	/**
	 * Displays/retrieves page links for paginated posts (i.e. including the
	 * `<!--nextpage-->` Quicktag one or more times). This tag must be
	 * within The Loop. Default: echo.
	 *
	 * @return void|string Formatted output in HTML.
	 */
	function karyawp_link_pages() {
		$args = apply_filters(
			'karyawp_link_pages_args',
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpzaro' ),
				'after'  => '</div>',
			)
		);
		wp_link_pages( $args );
	}
}