<?php
/**
 * Layout use Beaver Builder
 *
 * @package karyawp
*/

 // Exit if accessed directly.
 defined('ABSPATH') || exit;

if (!class_exists('FLThemeBuilderLayoutData'))
     return false;

if (!function_exists('karyawp_theme_support_bbrender')) {
    add_action( 'after_setup_theme', 'karyawp_theme_support_bbrender' );
    function karyawp_theme_support_bbrender() {
        add_theme_support( 'fl-theme-builder-headers' );
        add_theme_support( 'fl-theme-builder-footers' );
        add_theme_support( 'fl-theme-builder-parts' );
    }
}

if (!function_exists('karyawp_header_footer_bbrender')) {
    /**
     * Render Header or Footer Beaver Builder Themer
     */
    add_action('wp', 'karyawp_header_footer_bbrender');
    function karyawp_header_footer_bbrender() {
        // Get the header ID.
        $header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();
        // If we have a header, remove the theme header and hook in Beaver Themer'
        if (!empty($header_ids)) {
            remove_action('karyawp_header', 'karyawp_header',20);
            add_action('karyawp_header', 'FLThemeBuilderLayoutRenderer::render_header');
        }

        // Get the footer ID.
        $footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

        // If we have a footer, remove the theme footer and hook in Beaver Themer.
        if (!empty($footer_ids)) {
            remove_action('karyawp_footer', 'karyawp_footer', 20);
            add_action('karyawp_footer', 'FLThemeBuilderLayoutRenderer::render_footer');
        }
    }
}

if (!function_exists('karyawp_fl_theme_builder_part_hooks')) {
    /**
     * Render Parts Beaver Builder Themer
     */
    add_action('fl_theme_builder_part_hooks', 'karyawp_fl_theme_builder_part_hooks');
    function karyawp_fl_theme_builder_part_hooks() {
        return array(
            array(
              'label' => 'Header',
              'hooks' => array(
                'karyawp_header_before' => 'Before Header',
                'karyawp_header_after'  => 'After Header',
              )
            ),
            array(
              'label' => 'Content',
              'hooks' => array(
                'karyawp_content_before' => 'Before Content',
                'karyawp_content_after'  => 'After Content',
              )
            ),
            array(
              'label' => 'Footer',
              'hooks' => array(
                'karyawp_footer_before' => 'Before Footer',
                'karyawp_footer_after'  => 'After Footer',
              )
            )
        );
    }
}