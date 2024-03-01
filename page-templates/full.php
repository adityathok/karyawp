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
do_action('karyawp_container_before');

while ( have_posts() ) :
    the_post();
    the_content();
endwhile;

do_action('karyawp_container_after');
get_footer();