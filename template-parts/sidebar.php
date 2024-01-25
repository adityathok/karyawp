<?php
/**
 * The sidebar containing the main widget area
 *
 * @package karyawp
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}

dynamic_sidebar( 'main-sidebar' ); 