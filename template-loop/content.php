<?php
/**
 * Partial template for content in archive post
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<article <?php post_class('col-12 mb-4'); ?> id="post-<?php the_ID(); ?>">

    <div class="row">

        <div class="col-md-4 col-xl-3">
            <a rel="noopener follow" href="<?php echo esc_url( get_permalink() ); ?>">
                <div class="ratio ratio-4x3 bg-light">
                    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                </div>
            </a>
        </div>

        <div class="col-md-8 col-xl-9 mt-2 mt-md-0">  

            <header class="entry-header">
                <?php
                the_title(
                    sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
                    '</a></h2>'
                );
                ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                    echo get_the_excerpt();
                ?>
            </div><!-- .entry-content -->

            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta mt-2">
                    <small><?php echo karyawp_entry_meta(); ?></small>
                </div><!-- .entry-meta -->
            <?php endif; ?>

        </div>

    </div>


</article><!-- #post-## -->