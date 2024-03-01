<?php
/**
 * Description: The template for displaying the Singular.
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

do_action('karyawp_container_before');
?>

    <main class="site-main" id="main">

        <?php echo karyawp_breadcrumb(); ?>

        <?php
        while ( have_posts() ) {
            the_post();
            get_template_part( 'partials/content/single');

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
        ?>

    </main><!-- #main -->

<?php
do_action('karyawp_container_after');

get_footer();