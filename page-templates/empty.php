<?php
/**
 * Template Name: Empty karyaWP
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landing pages and other types of pages where you want to use a page builder.
 *
 * @package karyawp
 */

get_header();

while ( have_posts() ) :
    the_post();
    the_content();
endwhile;

get_footer();
 