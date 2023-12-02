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
	'/setup.php',           /// Theme setup and custom theme supports.
	'/enqueue.php',         /// Enqueue scripts and styles.
	'/layouts.php',	 		/// Layouting hooks
);

// Include files.
foreach ($zahro_includes as $file) {
	require_once get_theme_file_path($zahro_inc_dir . $file);
}