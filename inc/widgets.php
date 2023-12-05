<?php
/**
 * Declaring widgets
 *
 * @package zahro
*/


if (!function_exists('zahro_widgets_init')) {
    /**
    * Initializes themes widgets.
    */    
    add_action('widgets_init', 'zahro_widgets_init');
    function zahro_widgets_init() {
        //Main-Sidebar
        register_sidebar(
			array(
				'name'          => __('Main Sidebar', 'wpzaro'),
				'id'            => 'main-sidebar',
				'description'   => __('sidebar widget area', 'wpzaro'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
    }
}
