<?php
/**
 * Template Name: Single
 * Description: The template for displaying the Post.
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

    <?php 
    /** 
    * zahro_sidebar_left(), 20
    */
    do_action( 'zahro_sidebar_left' );
    ?>

    <main class="site-main" id="main">

        <?php
        while ( have_posts() ) {
            the_post();
            get_template_part( 'template-loop/content', 'post' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
        ?>

    </main><!-- #main -->

    <?php 
    /** 
    * zahro_sidebar_right()
    */
    do_action( 'zahro_sidebar_right' );
    ?>

<?php
get_footer();