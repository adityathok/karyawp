<?php
/**
 * Template Name: Container karyaWP
 *
 * Template to display a page with just a header and footer area and a content area with a container
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package karyawp
*/

get_header();
echo '<div class="'.karyawp_container_type().' container-content">';

while ( have_posts() ) :
    the_post();
    the_content();
endwhile;

echo '</div>';
get_footer();