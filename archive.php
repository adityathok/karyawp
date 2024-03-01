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

do_action('karyawp_sidebar_left');
?>

    <main class="site-main" id="main">

        <?php echo karyawp_breadcrumb(); ?>

        <header class="page-header mb-5">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
        </header>
        
        <div class="row row-archive">

            <?php
            if ( have_posts() ) {
                // Start the Loop.
                $i = 1;
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'partials/content/content', get_post_format() );
                    $i++;
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
do_action('karyawp_sidebar_right');

get_footer();