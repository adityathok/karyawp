<?php
/**
 * The Header
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action('wp_body_open'); ?>

	<div class="site" id="page">

		<div class="skippy visually-hidden-focusable overflow-hidden">
			<div class="container-xl">
				<a class="d-inline-flex p-2 m-1" href="#content"><?php esc_html_e('Skip to content', 'zahro'); ?></a>    
			</div>
		</div>

		<?php 
		/** 
		* inc/views/navbar
		* zahro_navbar()
		*/
		do_action( 'zahro_header' );
		?>

		<div class="site-content" id="page-content">