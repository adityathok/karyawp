<?php
/**
 * Costumizer use Kirki
 *
 * @package karyawp
 */

 // Exit if accessed directly.
defined('ABSPATH') || exit;

if (!class_exists('Kirki') || class_exists('Kirki') && KIRKI_VERSION < 4)
    return false;

//General
new \Kirki\Panel(
    'karyawp_general_panel',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'General', 'karyawp' ),
        'description' => esc_html__( 'General settings', 'karyawp' ),
    ]
);

//ite Identity
new \Kirki\Section(
    'title_tagline',
    [
        'title'       => esc_html__('Site Identity', 'karyawp'),
        'description' => esc_html__('Site Identity settings.', 'karyawp'),
        'panel'       => 'karyawp_general_panel',
        'priority'    => 160,
    ]
);

//Layout Section
new \Kirki\Section(
    'karyawp_layout_section',
    [
        'title'       => esc_html__('Layout', 'karyawp'),
        'description' => esc_html__('Layout settings.', 'karyawp'),
        'panel'       => 'karyawp_general_panel',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Dimension(
    [
        'settings'    => 'karyawp_container_width',
        'label'       => esc_html__('Max width container', 'karyawp'),
        'description' => esc_html__('Max width container default (px)', 'karyawp'),
        'section'     => 'karyawp_layout_section',
        'default'     => '1140px',
        'choices'     => [
            'accept_unitless' => true,
        ],
        'output' => array(
            array(
                'element'  => '.container',
                'property' => 'max-width',
            ),
        ),
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'karyawp_container_type',
        'label'       => esc_html__('Container Type', 'karyawp'),
        'section'     => 'karyawp_layout_section',
        'default'     => 'container',
        'placeholder' => esc_html__('Choose an option', 'karyawp'),
        'description' => esc_html__('Choose between Theme container and container-fluid', 'karyawp'),
        'choices'     => [
            'container'       => esc_html__('Container', 'karyawp'),
            'container-fluid' => esc_html__('Full Width container', 'karyawp'),
        ],
    ]
);
new \Kirki\Field\Select(
	[
		'settings'    => 'karyawp_sidebar_position',
		'label'       => esc_html__( 'Sidebar Position', 'karyawp' ),
		'section'     => 'karyawp_layout_section',
		'default'     => 'right',
		'placeholder' => esc_html__( 'Choose an option', 'karyawp' ),
		'choices'     => [
			'right'     => esc_html__( 'Right', 'karyawp' ),
			'left'      => esc_html__( 'Left', 'karyawp' ),
			'disable'   => esc_html__( 'Disable', 'karyawp' ),
		],
	]
);
// new \Kirki\Field\Checkbox(
// 	[
// 		'settings'    => 'karyawp_header_sticky',
// 		'label'       => esc_html__( 'Sticky Header', 'kirki' ),
// 		'description' => esc_html__( 'Enable sticky header', 'kirki' ),
// 		'section'     => 'karyawp_layout_section',
// 		'default'     => true,
// 	]
// );
new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'karyawp_header_sticky',
		'label'       => esc_html__( 'Sticky Header', 'kirki' ),
		'section'     => 'karyawp_layout_section',
		'default'     => 1,
		'priority'    => 10,
		'choices'     => [
			0   => esc_html__( 'Disable', 'kirki' ),
			1   => esc_html__( 'Enable', 'kirki' ),
		],
	]
);