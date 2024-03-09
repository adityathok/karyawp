<?php
/**
 * The functions and definitions
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// define Version
define( 'KARYAWP_VERSION', '0.1.0' );

//define if woocommerce is active
define( 'KARYAWP_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );

// includes directory.
$karyawp_inc_dir = 'inc';

// Array of files to include.
$karyawp_includes = array(
	'/plugins/tgm-plugin-activation.php',			/// TGM-Plugin-Activation
	'/plugins/kirki.php',							/// Kirki Customizer
	'/plugins/beaver-builder.php',					/// Beaver Builder Support
	'/template-tags.php',							/// Custom template tags for this theme
	'/post-tags.php',								/// Custom post tags for this theme
	'/extras.php',                          		/// Custom functions that act independently of the theme templates.
	'/setup.php',           						/// Theme setup and custom theme supports.
	'/class-wp-bootstrap-navwalker.php',           	/// WP Bootstrap Navwalker.
	'/pagination.php',           					/// Custom pagination for this theme.
	'/enqueue.php',         						/// Enqueue scripts and styles.
	'/block-editor.php',         					/// Block editor (gutenberg) specific functionality
	'/meta-box.php',         						/// Custom Meta box for themes
	'/widgets.php',	 								/// Declaring widgets
	'/custom-comments.php',							/// Layouting Comments Form
	'/breadcrumbs.php',								/// A breadcrumb menu script
	'/layouts.php',	 								/// Layouting hooks
	'/woocommerce.php',	 						    /// WooCommerce Support
);

// Include files.
foreach ($karyawp_includes as $file) {
	require_once get_theme_file_path($karyawp_inc_dir . $file);
}