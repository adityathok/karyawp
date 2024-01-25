<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

    <main class="site-main" id="main">

        <div class="row row-archive">

            <?php
            if ( have_posts() ) {
                // Start the Loop.
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-loop/content', get_post_format() );
                }
            } else {
                get_template_part( 'template-loop/content', 'none' );
            }
            ?>

        </div>

        <?php
        // Display the pagination.
        karyawp_pagination();
        ?>

    </main><!-- #main -->

<?php
get_footer();