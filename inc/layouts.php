<?php
/**
 * Layout Hooks
 *
 * @package karyawp
*/

/// Header
if (!function_exists('karyawp_header')) {
    add_action('karyawp_header', 'karyawp_header', 20);
    function karyawp_header()
    {
        get_template_part( 'partials/header/layout' );
    }
}

///Open content container
if (!function_exists('karyawp_open_content')) {
    add_action('karyawp_content_before', 'karyawp_open_content', 20);
    function karyawp_open_content()
    {
        if (
			is_page_template(
				array(
					'page-templates/canvas.php',
					'page-templates/empty.php',
				)
			)
		) {
			return;
		}

        if (
			is_page_template(
				array(
					'page-templates/full.php',
				)
			)
		) {
            echo '<div class="'.karyawp_container_type().' container-content">';
		} else {
            echo '<div class="'.karyawp_container_type().' container-content py-5">';
        }

    }
}
///close content container
if (!function_exists('karyawp_close_content')) {
    add_action('karyawp_content_after', 'karyawp_close_content', 20);
    function karyawp_close_content()
    {
        if (
			is_page_template(
				array(
					'page-templates/canvas.php',
				)
			)
		) {
			return;
		}
        echo '</div>';
    }
}

/// Footer
if (!function_exists('karyawp_footer')) {
    add_action('karyawp_footer', 'karyawp_footer', 20);
    function karyawp_footer()
    {
        get_template_part( 'partials/footer/layout' );
    }
}

/// Sidebar Left
if (!function_exists('karyawp_sidebar_left')) {
    add_action('karyawp_sidebar_left', 'karyawp_sidebar_left', 21);
    function karyawp_sidebar_left()
    {
		$sidebar_position = karyawp_sidebar_position();

        if ( ! is_active_sidebar( 'main-sidebar' ) || $sidebar_position == 'disable' ) {
            return;
        }

        echo '<div class="row '.($sidebar_position == 'right' ? 'flex-row' : 'flex-md-row-reverse').'">';
            echo '<div class="col-md-8 col-xl-9">';
    }
}
/// Sidebar right
if (!function_exists('karyawp_sidebar_right')) {
    add_action('karyawp_sidebar_right', 'karyawp_sidebar_right', 19);
    function karyawp_sidebar_right()
    {
		$sidebar_position = karyawp_sidebar_position();

        if ( ! is_active_sidebar( 'main-sidebar' ) || $sidebar_position == 'disable' ) {
            return;
        }

            echo '</div>'; /// end column content

            echo '<div class="col-md-4 col-xl-3">';
                get_template_part( 'partials/sidebar' );
            echo '</div>';
			
        echo '</div>'; // end ROW
    }
}