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

if (!function_exists('karyawp_footerwidgets_init')) {
    /**
    * Initializes themes widgets.
    */    
    add_action('widgets_init', 'karyawp_footerwidgets_init');
    function karyawp_footerwidgets_init() {
		
		// Customizer
		$widgets = get_theme_mod( 'karyawp_footer_widgets', 4 );

		if($widgets == 0)
			return false;

		for ($i = 1; $i <= 4; $i++) {

			$widget_number = sprintf(__('Footer Sidebar %d', 'karyawp'), $i);

			register_sidebar(
				array(
					'name'          => $widget_number,
					'id'            => 'footer-sidebar-' . $i,
					'description'   => sprintf(__('Widget untuk footer %d', 'karyawp'), $i),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}

    }
}
