<?php
/**
 * The sidebar containing the footer widget area
 *
 * @package karyawp
*/

$widgets = get_theme_mod( 'karyawp_footer_widgets', 3 );

if($widgets == 0)
    return false;

echo '<div class="row">';
    for ($x = 1; $x <= $widgets; $x++) {

        if ( ! is_active_sidebar( 'footer-sidebar-'.$x ) ) {
            continue;
        } 
        echo '<div class="col-md">';
            dynamic_sidebar( 'footer-sidebar-'.$x ); 
        echo '</div>';

    }
echo '</div>';