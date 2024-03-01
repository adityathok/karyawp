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

///Open content container
if (!function_exists('karyawp_open_content')) {
    add_action('karyawp_sidebar_left', 'karyawp_open_content', 19);
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
    add_action('karyawp_sidebar_right', 'karyawp_close_content', 21);
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

/// Scroll To Top
if (!function_exists('karyawp_footer_scrolltotop')) {
    add_action('wp_footer', 'karyawp_footer_scrolltotop', 19);
    function karyawp_footer_scrolltotop()
    {		
		// Customizer
		$scrolltotop = get_theme_mod( 'karyawp_footer_scrolltotop', 'enable' );

        if ( empty( $scrolltotop ) || $scrolltotop == 'disable' ) {
            return;
        }

        echo '<div class="position-fixed bottom-0 end-0">';
            echo '<button type="button" class="btn btn-sm btn-dark m-2 m-md-3 opacity-50" title="Scroll To Top" id="karyawp-scrolltotop" style="display: none;">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-up" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M7.776 5.553a.5.5 0 0 1 .448 0l6 3a.5.5 0 1 1-.448.894L8 6.56 2.224 9.447a.5.5 0 1 1-.448-.894z"/> </svg>';
            echo '</button>';
        echo '</div>';
			
    }
}