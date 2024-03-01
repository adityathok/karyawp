<?php
/**
 * Singular Page
 * Description: The template for displaying the Page.
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

do_action('karyawp_sidebar_left');
?>

    <main class="site-main" id="main">

        <?php echo karyawp_breadcrumb(); ?>

        <?php
        while ( have_posts() ) {
            the_post();
            get_template_part( 'partials/content/page');

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
        ?>

    </main><!-- #main -->

<?php
do_action('karyawp_sidebar_right');

get_footer();