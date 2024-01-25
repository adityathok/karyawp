<?php
/**
 * Declaring widgets
 *
 * @package karyawp
*/


if (!function_exists('karyawp_widgets_init')) {
    /**
    * Initializes themes widgets.
    */    
    add_action('widgets_init', 'karyawp_widgets_init');
    function karyawp_widgets_init() {
        //Main-Sidebar
        register_sidebar(
			array(
				'name'          => __('Main Sidebar', 'karyawp'),
				'id'            => 'main-sidebar',
				'description'   => __('sidebar widget area', 'karyawp'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
    }
}
