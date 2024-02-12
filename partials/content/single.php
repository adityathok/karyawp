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

    <div class="entry-meta mt-2 mb-3">
        <small><?php echo karyawp_entry_meta(); ?></small>
    </div><!-- .entry-meta -->
    
    <div class="entry-content">
    
        <?php
        //Thumbnail
        if ( has_post_thumbnail() ) {
            echo '<div class="mb-3">';
                echo get_the_post_thumbnail( $post->ID, 'full', array('class' => 'w-100 img-fluid mb-1') );
                
                $caption = get_post(get_post_thumbnail_id())->post_excerpt;
                if(!empty($caption)){//If description is not empty show the div
                    echo '<div class="featured_caption small fst-italic">' . $caption . '</div>';
                }
            echo '</div >';

        } ?>

        <?php
        the_content();
        ?>

    </div><!-- .entry-content -->

    <div class="mt-3 mb-2">
        <?php echo karyawp_post_tags(); ?>
    </div>

    <div class="post-nav mt-3 mb-5">
        <?php karyawp_post_nav(); ?>
    </div>

</article><!-- #post-## -->