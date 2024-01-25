<?php
/**
 * Theme basic setup
 *
 * @package karyawp
 */


// Exit if accessed directly.
defined('ABSPATH') || exit;

// Set the content width based on the theme's design and stylesheet.
if (!isset($content_width)) {
	$content_width = 640; /* pixels */
}

add_action('after_setup_theme', 'karyawp_setup');

if (!function_exists('karyawp_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function karyawp_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on karyawp, use a find and replace
		 * to change 'karyawp' to the name of your theme in all the template files
		 */
		load_theme_textdomain('karyawp', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' 	=> __('Primary Menu', 'karyawp'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support('post-thumbnails');

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support('customize-selective-refresh-widgets');

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress Theme logo feature.
		add_theme_support('custom-logo');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');
        
	}
}

add_action('after_setup_theme', 'karyawp_beaver_builder_support');

if (!function_exists('karyawp_beaver_builder_support')) {
	/**
	 * Add Themer support beaver builder to theme
	 */
	function karyawp_beaver_builder_support()
	{
		add_theme_support('fl-theme-builder-headers');
		add_theme_support('fl-theme-builder-footers');
	}
}