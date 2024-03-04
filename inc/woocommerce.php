<?php
/**
 * Declaring function for woocommerce
 *
 * @package karyawp
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if (!defined('KARYAWP_WOOCOMMERCE_ACTIVE'))
     return false;

// add theme support for woocommerce
add_action( 'after_setup_theme', 'karyawp_woocommerce_support' );
function karyawp_woocommerce_support() {
    //Add WoocCommerce theme support to our theme
    add_theme_support( 'woocommerce' );
    // To enable gallery features add WooCommerce Product zoom effect, lightbox and slider support to our theme
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
