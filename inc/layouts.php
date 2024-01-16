<?php
/**
 * Layout Hooks
 *
 * @package zahro
*/

/// Header
if (!function_exists('zahro_header')) {
    add_action('zahro_header', 'zahro_header', 20);
    function zahro_header()
    {
        get_template_part( 'templates-parts/header' );
    }
}

///Open content container
if (!function_exists('zahro_open_content')) {
    add_action('zahro_content_before', 'zahro_open_content', 21);
    function zahro_open_content()
    {
        echo '<div class="container container-content py-3">';
    }
}

///close content container
if (!function_exists('zahro_close_content')) {
    add_action('zahro_content_after', 'zahro_close_content', 19);
    function zahro_close_content()
    {
        echo '</div>';
    }
}
/// Footer
if (!function_exists('zahro_footer')) {
    add_action('zahro_footer', 'zahro_footer', 20);
    function zahro_footer()
    {
        get_template_part( 'templates-parts/footer' );
    }
}

/// SIDEBAR

/// Sidebar Left
if (!function_exists('zahro_sidebar_left')) {
    add_action('zahro_sidebar_left', 'zahro_sidebar_left', 20);
    function zahro_sidebar_left()
    {
        if ( ! is_active_sidebar( 'main-sidebar' ) ) {
            return;
        }
        echo '<div class="row">';
            echo '<div class="col-md-8 col-xl-9">';
    }
}

/// Sidebar right
if (!function_exists('zahro_sidebar_right')) {
    add_action('zahro_sidebar_right', 'zahro_sidebar_right', 20);
    function zahro_sidebar_right()
    {
        if ( ! is_active_sidebar( 'main-sidebar' ) ) {
            return;
        }
            echo '</div>'; /// end column content
            echo '<div class="col-md-4 col-xl-3">';
                get_template_part( 'templates-parts/sidebar' );
            echo '</div>';
        echo '</div>'; // end ROW
    }
}