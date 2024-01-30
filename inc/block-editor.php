<?php
/**
 * Block editor (gutenberg) specific functionality
 *
 * @package karyawp
 */

 
 add_action( 'after_setup_theme', 'karyawp_block_editor_setup' );

 if ( ! function_exists( 'karyawp_block_editor_setup' ) ) {
 
     /**
      * Sets up our default theme support for the WordPress block editor.
      */
     function karyawp_block_editor_setup() {
 
         // Add support for the block editor stylesheet.
         add_theme_support( 'editor-styles' );
         
         // Add support for the default block styles
         add_theme_support( 'wp-block-styles' );
 
         // Add support for wide alignment.
         add_theme_support( 'align-wide' );
 
         // add style from theme.css
         add_editor_style( 'assets/theme.css' );

         // add color pallete
         add_theme_support( 'editor-color-palette', array(
            array(
                'name'  => esc_attr__( 'primary karyawp', 'karyawp' ),
                'slug'  => 'primary-karyawp',
                'color' => 'var(--bs-primary)',
            ),
            array(
                'name'  => esc_attr__( 'secondary karyawp', 'karyawp' ),
                'slug'  => 'secondary-karyawp',
                'color' => 'var(--bs-secondary)',
            ),
        ) );
 
     }
 }
 