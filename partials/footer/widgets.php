<?php
/**
 * The sidebar containing the footer widget area
 *
 * @package karyawp
*/

echo '<div class="row">';
    for ($x = 1; $x <= 4; $x++) {

        if ( ! is_active_sidebar( 'footer-sidebar-'.$x ) ) {
            continue;
        } 
        echo '<div class="col-md">';
            dynamic_sidebar( 'footer-sidebar-'.$x ); 
        echo '</div>';

    }
echo '</div>';