<?php
/**
 * Blog Index
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
                $post_order = 1;
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'partials/content/content', get_post_format() );
                    $post_order++;
                }
            } else {
                get_template_part( 'partials/content/none' );
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