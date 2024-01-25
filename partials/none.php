<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="page-content">

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>

		<p>
			<?php
			/* translators: 1: Admin URL 2: </a> */
			echo sprintf( esc_html__( 'Ready to publish your first post? %1$sGet started here%2$s.', 'karyawp' ), '<a href="' . esc_url( admin_url( 'post-new.php' ) ) . '" target="_blank">', '</a>' );
			?>
		</p>

	<?php } elseif ( is_search() ) { ?>

		<p>
			<?php
			esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'karyawp' );
			?>
		</p>

	<?php } elseif ( is_category() ) { ?>

		<p>
			<?php
			esc_html_e( 'There aren\'t any posts currently published in this category.', 'karyawp' );
			?>
		</p>

	<?php } elseif ( is_tax() ) { ?>

		<p>
			<?php
			esc_html_e( 'There aren\'t any posts currently published under this taxonomy.', 'karyawp' );
			?>
		</p>

	<?php } elseif ( is_tag() ) { ?>

		<p>
			<?php
			esc_html_e( 'There aren\'t any posts currently published under this tag.', 'karyawp' );
			?>
		</p>

	<?php } else { ?>

		<p>
			<?php
			esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'karyawp' );
			?>
		</p>

	<?php } ?>

</div><!-- .page-content -->