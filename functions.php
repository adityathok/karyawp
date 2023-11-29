<?php
/**
 * The functions and definitions
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// includes directory.
$zahro_inc_dir = 'inc';

// Array of files to include.
$zahro_includes = array(
	'/setup.php',           /// Theme setup and custom theme supports.
	'/enqueue.php',         /// Enqueue scripts and styles.
);

// Include files.
foreach ($zahro_includes as $file) {
	require_once get_theme_file_path($zahro_inc_dir . $file);
}