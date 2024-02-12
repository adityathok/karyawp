<?php
/**
 * Partial template for content in single.php
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

    <div class="entry-meta mt-2">
        <small><?php echo karyawp_entry_meta(); ?></small>
    </div><!-- .entry-meta -->
    
    <div class="entry-content">
    
        <?php echo get_the_post_thumbnail( $post->ID, 'large', array('class' => 'w-100 img-fluid') ); ?>

        <?php
        the_content();
        ?>

    </div><!-- .entry-content -->

</article><!-- #post-## -->