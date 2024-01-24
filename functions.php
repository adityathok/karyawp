<?php
/**
 * The functions and definitions
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// define Version
define( 'ZAHRO_VERSION', '0.0.1' );

// includes directory.
$zahro_inc_dir = 'inc';

// Array of files to include.
$zahro_includes = array(
	'/template-tags.php',							/// Custom template tags for this theme
	'/extras.php',                          		/// Custom functions that act independently of the theme templates.
	'/setup.php',           						/// Theme setup and custom theme supports.
	'/class-wp-bootstrap-navwalker.php',           	/// WP Bootstrap Navwalker.
	'/pagination.php',           					/// Custom pagination for this theme..
	'/enqueue.php',         						/// Enqueue scripts and styles.
	'/widgets.php',	 								/// Declaring widgets
	'/custom-comments.php',							/// Layouting Comments Form
	'/layouts.php',	 								/// Layouting hooks
);

// Include files.
foreach ($zahro_includes as $file) {
	require_once get_theme_file_path($zahro_inc_dir . $file);
}