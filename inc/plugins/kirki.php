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

//Panel
new \Kirki\Panel(
    'karyawp_options_panel',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'KaryaWP Options Panel', 'karyawp' ),
        'description' => esc_html__( 'Customize your KaryaWP theme', 'karyawp' ),
    ]
);
//site Identity
new \Kirki\Section(
    'title_tagline',
    [
        'title'       => esc_html__('Logo, Title & Favicon', 'karyawp'),
        'description' => esc_html__('Site Identity settings.', 'karyawp'),
        'panel'       => 'karyawp_options_panel',
        'priority'    => 160,
    ]
);

//Layout Section
new \Kirki\Section(
    'karyawp_layout_section',
    [
        'title'       => esc_html__('Layout', 'karyawp'),
        'description' => esc_html__('Layout and Container settings.', 'karyawp'),
        'panel'       => 'karyawp_options_panel',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Dimension(
    [
        'settings'    => 'karyawp_container_width',
        'label'       => esc_html__('Max width container', 'karyawp'),
        'description' => esc_html__('Max width container default (px)', 'karyawp'),
        'section'     => 'karyawp_layout_section',
        'default'     => '1220px',
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
		'default'     => 'right',
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
        'description' => esc_html__('Typography general settings.', 'karyawp'),
        'panel'       => 'karyawp_options_panel',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Typography(
    [
        'settings'    => 'karyawp_typography_general',
        'label'       => esc_html__('General Typography', 'karyawp'),
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

//Colors Section
new \Kirki\Section(
    'karyawp_colors_section',
    [
        'title'       => esc_html__('Colors', 'karyawp'),
        'description' => esc_html__('Colors general settings.', 'karyawp'),
        'panel'       => 'karyawp_options_panel',
        'priority'    => 160,
    ]
);

new \Kirki\Field\Color(
	[
		'settings'    => 'karyawp_primary_color',
		'label'       => __( 'Primary Color', 'karyawp' ),
		'description' => esc_html__( '', 'karyawp' ),
		'section'     => 'karyawp_colors_section',
		'default'     => '#184cdb',
        'output'      => [
            [
                'choice'    => 'color',
                'element'   => ':root',
                'property'  => '--bs-primary',
            ],
            [
                'choice'    => 'color',
                'element'   => '[data-bs-theme=light]',
                'property'  => '--bs-primary',
            ],
            [
                'choice'    => 'hover',
                'element'   => ':root',
                'property'  => '--karyawp-primary',
            ]
        ],
	]
);
new \Kirki\Field\Color(
	[
		'settings'    => 'karyawp_font_color',
		'label'       => __( 'Font Color', 'karyawp' ),
		'description' => esc_html__( '', 'karyawp' ),
		'section'     => 'karyawp_colors_section',
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
        'section'   => 'karyawp_colors_section',
        'priority'  => 10,
        'choices'   => [
            'color'    => esc_html__('Color', 'karyawp'),
            'hover'    => esc_html__('Hover', 'karyawp'),
            'active'   => esc_html__('Active', 'karyawp'),
        ],
        'alpha'     => true,
        'default'   => [
            'color'  => '#212121',
            'hover'  => '#184cdb',
            'active' => '#212121',
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
new \Kirki\Field\Background(
	[
		'settings'    => 'karyawp_background_general',
		'label'       => esc_html__( 'Background', 'kirki' ),
		'description' => esc_html__( 'General background for website', 'kirki' ),
		'section'     => 'karyawp_colors_section',
		'default'     => [
			'background-color'      => 'rgba(255,255,255)',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => 'body[data-bs-theme=light]',
			],
		],
	]
);

// Footer Section
new \Kirki\Section(
    'karyawp_footer_section',
    [
        'title'       => esc_html__('Footer', 'karyawp'),
        'description' => esc_html__('Footer settings.', 'karyawp'),
        'panel'       => 'karyawp_options_panel',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'karyawp_footer_scrolltotop',
		'label'       => esc_html__( 'Scroll To Top', 'karyawp' ),
		'section'     => 'karyawp_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			0   => esc_html__( 'Disable', 'karyawp' ),
			1   => esc_html__( 'Enable', 'karyawp' ),
		],
	]
);