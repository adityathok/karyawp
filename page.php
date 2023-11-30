<?php
/**
 * Template Name: Page
 * Description: The template for displaying the Page.
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

    <main class="site-main" id="main">

        <?php
        while ( have_posts() ) {
            the_post();
            get_template_part( 'template-loop/content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
        ?>

    </main><!-- #main -->

<?php
get_footer();