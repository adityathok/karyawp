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

//site Identity
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
new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'karyawp_sidebar_position',
		'label'       => esc_html__( 'Sidebar Position', 'karyawp' ),
		'section'     => 'karyawp_layout_section',
		'default'     => 'disable',
		'placeholder' => esc_html__( 'Choose an option', 'karyawp' ),
		'choices'     => [
			'right'     => esc_html__( 'Right', 'karyawp' ),
			'left'      => esc_html__( 'Left', 'karyawp' ),
			'disable'   => esc_html__( 'Disable', 'karyawp' ),
		],
	]
);

//Typography Section
new \Kirki\Section(
    'karyawp_typography_section',
    [
        'title'       => esc_html__('Typography', 'karyawp'),
        'description' => esc_html__('Typography global settings.', 'karyawp'),
        'panel'       => 'karyawp_general_panel',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Typography(
    [
        'settings'    => 'karyawp_typography_global',
        'label'       => esc_html__('Typography', 'karyawp'),
        'description' => esc_html__('Select typography options', 'karyawp'),
        'section'     => 'karyawp_typography_section',
        'priority'    => 10,
        'transport'   => 'auto',
        'default'     => [
            'font-family'     => 'Lato',
            'variant'         => 'regular',
            'font-style'      => 'normal',
            'font-size'       => '1rem',
            'line-height'     => '1.5',
            'letter-spacing'  => '0',
        ],
        'output'      => [
            [
                'element' => 'body,.is-root-container',
            ],
        ],
    ]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'karyawp_font_color',
		'label'       => __( 'Font Color', 'karyawp' ),
		'description' => esc_html__( '', 'karyawp' ),
		'section'     => 'karyawp_typography_section',
		'default'     => '#212121',
        'output'      => [
            [
                'choice'    => 'color',
                'element'   => '[data-bs-theme="light"]',
                'property'  => '--bs-body-color',
            ],
        ],
	]
);
new \Kirki\Field\Multicolor(
    [
        'settings'  => 'karyawp_link_color',
        'label'     => esc_html__('Link Color', 'karyawp'),
        'section'   => 'karyawp_typography_section',
        'priority'  => 10,
        'choices'   => [
            'color'    => esc_html__('Color', 'karyawp'),
            'hover'    => esc_html__('Hover', 'karyawp'),
            'active'   => esc_html__('Active', 'karyawp'),
        ],
        'alpha'     => true,
        'default'   => [
            'color'  => '#184cdb',
            'hover'  => '#212121',
            'active' => '#184cdb',
        ],
        'output'    => [
            [
                'choice'    => 'color',
                'element'   => '[data-bs-theme="light"]',
                'property'  => '--bs-link-color',
            ],
            [
                'choice'    => 'hover',
                'element'   => '[data-bs-theme="light"]',
                'property'  => '--bs-link-hover-color',
            ],
            [
                'choice'    => 'active',
                'element'   => '[data-bs-theme="light"]',
                'property'  => '--bs-link-active-color',
            ],
        ],
    ]
);

//Header Panel
new \Kirki\Panel(
    'karyawp_header_panel',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'Header', 'karyawp' ),
        'description' => esc_html__( 'Header settings', 'karyawp' ),
    ]
);

//Header Section
new \Kirki\Section(
    'karyawp_header_section',
    [
        'title'       => esc_html__('Header', 'karyawp'),
        'description' => esc_html__('Header settings.', 'karyawp'),
        'panel'       => 'karyawp_header_panel',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'karyawp_header_sticky',
		'label'       => esc_html__( 'Sticky Header', 'karyawp' ),
		'section'     => 'karyawp_header_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			0   => esc_html__( 'Disable', 'karyawp' ),
			1   => esc_html__( 'Enable', 'karyawp' ),
		],
	]
);
new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'karyawp_header_overlay',
		'label'       => esc_html__( 'Overlay Header', 'karyawp' ),
		'section'     => 'karyawp_header_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			0   => esc_html__( 'Disable', 'karyawp' ),
			1   => esc_html__( 'Enable', 'karyawp' ),
		],
	]
);
//Header Logo Section
new \Kirki\Section(
    'karyawp_headerlogo_section',
    [
        'title'       => esc_html__('Logo', 'karyawp'),
        'description' => esc_html__('Logo settings.', 'karyawp'),
        'panel'       => 'karyawp_header_panel',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Dimension(
	[
		'settings'    => 'karyawp_max_height_logo',
		'label'       => esc_html__( 'Max Height Logo', 'karyawp' ),
		'description' => esc_html__( 'Logo size', 'karyawp' ),
		'section'     => 'karyawp_headerlogo_section',
		'default'     => '3rem',
		'choices'     => [
			'accept_unitless' => false,
		],
        'transport' => 'auto',
        'output'    => array(
            array(
                'element'  => '#navbar-main .navbar-brand img',
                'property' => 'max-height'
            ),
        ),
	]
);

//Footer Panel
new \Kirki\Panel(
    'karyawp_footer_panel',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'Footer', 'karyawp' ),
        'description' => esc_html__( 'Footer settings', 'karyawp' ),
    ]
);

//Scroll To Top Section
new \Kirki\Section(
    'karyawp_scrolltotop_section',
    [
        'title'       => esc_html__('Scroll To Top', 'karyawp'),
        'description' => esc_html__('Navigation Scroll To Top settings.', 'karyawp'),
        'panel'       => 'karyawp_footer_panel',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'karyawp_footer_scrolltotop',
		'label'       => esc_html__( 'Scroll To Top', 'karyawp' ),
		'section'     => 'karyawp_scrolltotop_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			0   => esc_html__( 'Disable', 'karyawp' ),
			1   => esc_html__( 'Enable', 'karyawp' ),
		],
	]
);