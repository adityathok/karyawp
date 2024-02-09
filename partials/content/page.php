<?php
/**
 * Partial template for content in page.php
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">

        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    </header><!-- .entry-header -->

    <div class="entry-content">

        <?php
        the_content();
        ?>

    </div><!-- .entry-content -->

</article><!-- #post-## -->