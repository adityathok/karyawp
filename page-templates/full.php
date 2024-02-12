<?php
/**
 * Template Name: Full karyaWP
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package karyawp
 */

get_header();

while ( have_posts() ) :
    the_post();
    the_content();
endwhile;

get_footer();