<?php
/**
 * 404
 * Description: The template for displaying not found pages.
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

    <main class="site-main" id="main">

        <div class="text-center mx-auto" style="max-width: 40em;">

            <h1 class="fw-bold">
                404
            </h1>

            <h2 class="entry-title">
                <?php esc_html_e( 'This page could not be found!', 'karyawp' ); ?>
            </h2>
            
            <p class="mt-3"> 
                <?php esc_html_e( 'We are sorry. But the page you are looking for is not available.', 'karyawp' ); ?><br />
                <?php esc_html_e( 'Perhaps you can try a new search.', 'karyawp' ); ?>
            </p>

            <?php get_search_form(); ?>

            <a class="btn btn-dark btn-lg my-5 rounded-0 icon-link-hover" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php esc_html_e( 'Back To Homepage', 'karyawp' ); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                </svg>
            </a>

        </div>

    </main><!-- #main -->

<?php
get_footer();