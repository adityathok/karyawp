<?php
/**
 * archive pages
 * Description: The template for displaying archive pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
        if ( have_posts() ) {
            woocommerce_content();
        }
        ?>

        <?php
        // Display the pagination.
        karyawp_pagination();
        ?>

    </main><!-- #main -->

<?php
do_action('karyawp_container_after');

get_footer();