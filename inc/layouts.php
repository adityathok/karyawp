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
        echo '<div class="container container-content py-3">';
    }
}
///close content container
if (!function_exists('karyawp_close_content')) {
    add_action('karyawp_content_after', 'karyawp_close_content', 20);
    function karyawp_close_content()
    {
        echo '</div>';
    }
}

///Open content wrapper
if (!function_exists('karyawp_open_content_wrapper')) {
    add_action('karyawp_content_before', 'karyawp_open_content_wrapper', 19);
    function karyawp_open_content_wrapper()
    {
        echo '<div class="content-wrapper py-3 py-md-5">';
    }
}
///close content wrapper
if (!function_exists('karyawp_close_content_wrapper')) {
    add_action('karyawp_content_after', 'karyawp_close_content_wrapper', 21);
    function karyawp_close_content_wrapper()
    {
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
    add_action('karyawp_content_before', 'karyawp_sidebar_left', 21);
    function karyawp_sidebar_left()
    {
        if ( ! is_active_sidebar( 'main-sidebar' ) ) {
            return;
        }
        echo '<div class="row">';
            echo '<div class="col-md-8 col-xl-9">';
    }
}
/// Sidebar right
if (!function_exists('karyawp_sidebar_right')) {
    add_action('karyawp_content_after', 'karyawp_sidebar_right', 19);
    function karyawp_sidebar_right()
    {
        if ( ! is_active_sidebar( 'main-sidebar' ) ) {
            return;
        }
            echo '</div>'; /// end column content
            echo '<div class="col-md-4 col-xl-3">';
                get_template_part( 'partials/sidebar' );
            echo '</div>';
        echo '</div>'; // end ROW
    }
}