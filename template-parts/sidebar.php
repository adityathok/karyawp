<?php
/**
 * The sidebar containing the main widget area
 *
 * @package zahro
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}

dynamic_sidebar( 'main-sidebar' ); 