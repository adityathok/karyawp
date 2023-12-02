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
        get_template_part( 'template-parts/header' );
    }
}

///Open content container
if (!function_exists('zahro_open_content')) {
    add_action('zahro_content_before', 'zahro_open_content', 21);
    function zahro_open_content()
    {
        echo '<div class="container container-content">';
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
        get_template_part( 'template-parts/footer' );
    }
}